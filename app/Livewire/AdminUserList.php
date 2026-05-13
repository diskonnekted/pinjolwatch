<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\User;

class AdminUserList extends Component
{
    use WithPagination;

    #[Layout('components.admin-layout')]

    public $search = '';
    public $role = '';
    public $status = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = ['search', 'role', 'status', 'sortField', 'sortDirection'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $isEditModalOpen = false;
    public $isResetModalOpen = false;
    public $isCreateModalOpen = false;
    public $editingUserId;
    public $editingName;
    public $editingEmail;
    public $editingRoles = [];
    public $newPassword;

    // Create User Fields
    public $newName;
    public $newEmail;
    public $newUserPassword;
    public $newUserRoles = ['user'];

    public function openCreateModal()
    {
        $this->newName = '';
        $this->newEmail = '';
        $this->newUserPassword = '';
        $this->newUserRoles = ['user'];
        $this->isCreateModalOpen = true;
    }

    public function createUser()
    {
        $this->validate([
            'newName' => 'required|string|max:255',
            'newEmail' => 'required|email|unique:users,email',
            'newUserPassword' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $this->newName,
            'email' => $this->newEmail,
            'password' => \Illuminate\Support\Facades\Hash::make($this->newUserPassword),
            'email_verified_at' => now(), // Auto verify if created by admin
        ]);

        $user->assignRole($this->newUserRoles);

        $this->isCreateModalOpen = false;
        session()->flash('message', 'User ' . $user->name . ' created successfully.');
    }

    public function openEditModal($userId)
    {
        $user = User::findOrFail($userId);
        $this->editingUserId = $userId;
        $this->editingName = $user->name;
        $this->editingEmail = $user->email;
        $this->editingRoles = $user->roles->pluck('name')->toArray();
        $this->isEditModalOpen = true;
    }

    public function updateUser()
    {
        $this->validate([
            'editingName' => 'required|string|max:255',
            'editingEmail' => 'required|email|unique:users,email,' . $this->editingUserId,
        ]);

        $user = User::findOrFail($this->editingUserId);
        $user->update([
            'name' => $this->editingName,
            'email' => $this->editingEmail,
        ]);

        $user->syncRoles($this->editingRoles);

        $this->isEditModalOpen = false;
        session()->flash('message', 'User updated successfully.');
    }

    public function openResetModal($userId)
    {
        $this->editingUserId = $userId;
        $this->newPassword = '';
        $this->isResetModalOpen = true;
    }

    public function saveNewPassword()
    {
        $this->validate([
            'newPassword' => 'required|min:8',
        ]);

        $user = User::findOrFail($this->editingUserId);
        $user->update([
            'password' => \Illuminate\Support\Facades\Hash::make($this->newPassword),
        ]);

        $this->isResetModalOpen = false;
        session()->flash('message', 'Password reset successfully for ' . $user->name);
    }

    public function verifyUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->email_verified_at = now();
        $user->save();
        session()->flash('message', 'User verified successfully.');
    }

    public function deleteUser($userId)
    {
        if (auth()->id() === $userId) {
            session()->flash('error', 'You cannot delete yourself.');
            return;
        }

        User::findOrFail($userId)->delete();
        session()->flash('message', 'User deleted successfully.');
    }

    public function render()
    {
        $query = User::with(['roles', 'recoveryProgress'])
            ->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            });

        if ($this->role) {
            if ($this->role === 'user') {
                $query->where(function($q) {
                    $q->role('user')
                      ->orWhereDoesntHave('roles');
                });
            } else {
                $query->role($this->role);
            }
        }

        if ($this->status === 'verified') {
            $query->whereNotNull('email_verified_at');
        } elseif ($this->status === 'unverified') {
            $query->whereNull('email_verified_at');
        }

        $users = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate(15);

        return view('livewire.admin-user-list', [
            'users' => $users,
            'availableRoles' => \Spatie\Permission\Models\Role::all(),
            'totalStages' => \App\Models\RecoveryStage::count()
        ]);
    }
}

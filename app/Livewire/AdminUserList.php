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
        $query = User::with('roles')
            ->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            });

        if ($this->role) {
            $query->role($this->role);
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
            'availableRoles' => \Spatie\Permission\Models\Role::all()
        ]);
    }
}

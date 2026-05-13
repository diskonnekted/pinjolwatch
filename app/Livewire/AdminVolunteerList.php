<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VolunteerApplication;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class AdminVolunteerList extends Component
{
    use WithPagination;

    #[Layout('components.admin-layout')]

    public $search = '';
    public $statusFilter = '';

    public function updateStatus($id, $status)
    {
        $application = VolunteerApplication::findOrFail($id);
        $application->update(['status' => $status]);
        
        session()->flash('message', "Status aplikasi {$application->full_name} diperbarui ke {$status}.");
    }

    public function delete($id)
    {
        VolunteerApplication::destroy($id);
        session()->flash('message', 'Aplikasi berhasil dihapus.');
    }

    public function render()
    {
        $query = VolunteerApplication::query();

        if ($this->search) {
            $query->where('full_name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        return view('livewire.admin-volunteer-list', [
            'applications' => $query->latest()->paginate(10)
        ]);
    }
}

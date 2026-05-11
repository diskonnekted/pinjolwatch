<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class AdminAuditLog extends Component
{
    use WithPagination;

    #[Layout('components.admin-layout')]
    
    public $search = '';
    public $filterMethod = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterMethod' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterMethod()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = AuditLog::with('user');

        if ($this->search) {
            $query->where(function($q) {
                $q->where('route_name', 'like', '%' . $this->search . '%')
                  ->orWhere('url', 'like', '%' . $this->search . '%')
                  ->orWhereHas('user', function($u) {
                      $u->where('name', 'like', '%' . $this->search . '%');
                  });
            });
        }

        if ($this->filterMethod) {
            $query->where('http_method', $this->filterMethod);
        }

        $logs = $query->latest()->paginate(20);

        return view('livewire.admin-audit-log', [
            'logs' => $logs
        ]);
    }
}

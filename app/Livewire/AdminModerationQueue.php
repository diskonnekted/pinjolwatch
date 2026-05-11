<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Report;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class AdminModerationQueue extends Component
{
    use WithPagination;

    #[Layout('components.admin-layout')]
    public $search = '';
    public $statusFilter = '';

    protected $queryString = ['search', 'statusFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updateStatus($reportId, $status)
    {
        $report = Report::findOrFail($reportId);
        $oldStatus = $report->status;
        $report->update(['status' => $status]);
        
        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.moderation.update',
            'http_method' => 'PATCH',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode([
                'ticket_id' => $report->ticket_id,
                'old_status' => $oldStatus,
                'new_status' => $status
            ]),
        ]);

        session()->flash('message', "Status tiket {$report->ticket_id} diperbarui ke " . ucfirst($status));
    }

    public function deleteReport($reportId)
    {
        $report = Report::findOrFail($reportId);
        $ticketId = $report->ticket_id;
        $report->delete();

        AuditLog::create([
            'user_id' => Auth::id(),
            'route_name' => 'admin.moderation.delete',
            'http_method' => 'DELETE',
            'url' => request()->fullUrl(),
            'ip_masked' => $this->maskIP(request()->ip()),
            'payload_summary' => json_encode(['ticket_id' => $ticketId]),
        ]);

        session()->flash('message', "Tiket {$ticketId} berhasil dihapus.");
    }

    private function maskIP(?string $ip): string
    {
        if (!$ip) return 'unknown';
        return preg_replace('/(\.\d+){2}$/', '.xxx.xxx', $ip);
    }

    public function render()
    {
        $reports = Report::with(['kabupaten', 'threatType'])
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('ticket_id', 'like', '%' . $this->search . '%')
                      ->orWhere('app_name', 'like', '%' . $this->search . '%')
                      ->orWhere('chronology', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->statusFilter, function($query) {
                $query->where('status', $this->statusFilter);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin-moderation-queue', [
            'reports' => $reports
        ]);
    }
}

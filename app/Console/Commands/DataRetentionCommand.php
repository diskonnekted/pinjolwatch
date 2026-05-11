<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Report;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DataRetentionCommand extends Command
{
    protected $signature = 'reports:cleanup';
    protected $description = 'Archives or deletes reports older than 24 months based on their status.';

    public function handle(): void
    {
        $this->info('Starting report cleanup process...');

        $threshold = Carbon::now()->subMonths(24);

        // Soft delete resolved reports older than the threshold
        $softDeleted = Report::where('status', 'resolved')
            ->where('created_at', '<', $threshold)
            ->whereNull('deleted_at')
            ->delete();
        
        if ($softDeleted > 0) {
            Log::info("DataRetention: Soft-deleted {$softDeleted} resolved reports older than {$threshold->toDateString()}.");
            $this->info("Soft-deleted {$softDeleted} resolved reports.");
        }

        // Hard delete reports that were soft-deleted over 30 days ago
        $permanentlyDeleted = Report::onlyTrashed()
            ->where('deleted_at', '<', Carbon::now()->subDays(30))
            ->forceDelete();

        if ($permanentlyDeleted > 0) {
            Log::info("DataRetention: Permanently deleted {$permanentlyDeleted} reports that were in the trash for more than 30 days.");
            $this->info("Permanently deleted {$permanentlyDeleted} old reports.");
        }

        $this->info("✅ Report cleanup process finished.");
    }
}

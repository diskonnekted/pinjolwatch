<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('reports:cleanup')->daily()->at('02:00');

use App\Services\OjkFintechSyncService;

Schedule::call(function () {
    $service = app(OjkFintechSyncService::class);
    $result = $service->sync();
    \Log::info('OJK Fintech Sync: ' . json_encode($result));
})->weekly()->mondays()->at('03:00');

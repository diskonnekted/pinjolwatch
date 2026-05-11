<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $agent = new \Jenssegers\Agent\Agent();
    if ($agent->isMobile() || $agent->isTablet()) {
        return view('mobile.home');
    }
    return view('welcome');
});

Route::get('/peta', function () {
    return view('map');
})->name('map');

Route::get('/cek-tiket', function () {
    return view('track');
})->name('track');

Route::get('/info-pinjol', function () {
    return view('info-pinjol');
})->name('info-pinjol');

Route::get('/cerita-kita', function () {
    return view('stories');
})->name('stories');

Route::get('/cerita-kita/{slug}', function ($slug) {
    return view('stories-detail', ['slug' => $slug]);
})->name('stories.show');

Route::get('/panduan-keluarga', function () {
    return view('panduan-keluarga');
})->name('panduan-keluarga');

Route::get('/tidak-sendiri-tidak-malu', function () {
    return view('anti-stigma');
})->name('anti-stigma');

Route::get('/menghadapi-dc', function () {
    return view('panduan-dc');
})->name('panduan-dc');

Route::get('/pemulihan-keuangan', function () {
    return view('panduan-keuangan');
})->name('panduan-keuangan');

Route::get('/waspada-joki-pinjol', function () {
    return view('bahaya-joki');
})->name('bahaya-joki');

Route::get('/disclaimer', function () {
    return view('disclaimer');
})->name('disclaimer');

Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');

Route::get('/cek-kesehatan', function () {
    return view('quiz');
})->name('quiz');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/lapor', function () {
        return view('report');
    })->name('report');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


use App\Http\Controllers\ConsentController;

Route::get('/kebijakan-privasi', function() {
    return view('privacy-policy');
})->name('privacy.policy');

Route::get('/tarik-persetujuan/{ticket}', [ConsentController::class, 'show'])->name('consent.withdraw');
Route::post('/tarik-persetujuan/{ticket}', [ConsentController::class, 'process'])->name('consent.process');


require __DIR__.'/auth.php';

use App\Http\Controllers\ReportExportController;

// ... (other routes)

Route::get('/stories/create', function () {
    return view('stories-create');
})->name('stories.create');

Route::middleware(['auth', 'role:super-admin|moderator', 'audit'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function() {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', \App\Livewire\AdminModerationQueue::class)->name('dashboard');

    Route::get('/reports/{ticket}', \App\Livewire\ReportDetail::class)->name('reports.detail');

    Route::middleware('consent')->get('/export-reports', [ReportExportController::class, 'exportPdf'])->name('export');
});

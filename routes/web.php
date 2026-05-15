<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Fetch specific experience articles for the landing page
    $featuredTitles = [
        'Di Balik Langit Cerahmu: Undangan untuk Berempat',
        'Ponsel itu Bergetar, dan Hatiku Runtuh. Tapi Kita Akan Bangun Ulang.',
        'Aku Hanya Butuh Didengar, Bukan Divonis'
    ];

    $featuredStories = \App\Models\Article::whereIn('title', $featuredTitles)
        ->where('status', 'published')
        ->get();

    // Fallback if specific titles not found (maybe minor typos in DB)
    if ($featuredStories->count() < 3) {
        $extraStories = \App\Models\Article::where('type', 'experience')
            ->where('status', 'published')
            ->whereNotIn('title', $featuredTitles)
            ->latest()
            ->take(3 - $featuredStories->count())
            ->get();
        $featuredStories = $featuredStories->concat($extraStories);
    }

    return view('welcome', ['featuredStories' => $featuredStories]);
});

Route::get('/peta', function () {
    return view('map');
})->name('map');

Route::get('/statistik', function () {
    return view('statistik');
})->name('statistik');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/cek-tiket', function () {
    return view('track');
})->name('track');

Route::get('/info-pinjol', function () {
    return view('info-pinjol');
})->name('info-pinjol');

Route::get('/cerita-kita', function () {
    return view('stories');
})->name('stories');

Route::get('/stories/{slug}', function ($slug) {
    return view('stories-detail', ['slug' => $slug]);
})->name('stories.show');

Route::get('/berita-pinjol', function () {
    return view('news-feed');
})->name('news-feed');

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

Route::get('/bantuan-mental', function () {
    return view('mental-health-directory');
})->name('mental-health-directory');

Route::get('/disclaimer', function () {
    return view('disclaimer');
})->name('disclaimer');

Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');

Route::get('/gabung-relawan', function () {
    return view('join');
})->name('join');

Route::get('/cek-kesehatan', function () {
    return view('quiz');
})->name('quiz');

Route::get('/offline', function () {
    return view('offline');
})->name('offline');

Route::get('/unduh-materi', function () {
    return view('download');
})->name('download');

Route::get('/kalkulator-gltl', function () {
    return view('kalkulator-gltl');
})->name('kalkulator-gltl');

Route::get('/panduan/negosiasi-utang', function () {
    return view('keuangan.template-negosiasi');
})->name('panduan.negosiasi-utang');

Route::get('/panduan/cek-slik', function () {
    return view('keuangan.cek-slik');
})->name('panduan.cek-slik');

Route::get('/panduan/perencanaan-keuangan', function () {
    return view('keuangan.perencanaan-keuangan');
})->name('panduan.perencanaan-keuangan');

Route::get('/panduan/dana-darurat', function () {
    return view('keuangan.dana-darurat');
})->name('panduan.dana-darurat');

Route::get('/dashboard', function () {
    if (auth()->user() && auth()->user()->hasAnyRole(['super-admin', 'moderator'])) {
        return redirect()->route('admin.overview');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/tools', function () {
    return redirect()->route('dashboard', ['tab' => 'security']);
})->middleware(['auth', 'verified'])->name('dashboard.tools');


Route::middleware('auth')->group(function () {
    Route::get('/lapor', function () {
        return view('report');
    })->name('report');

    // User report detail — uses ticket_id, shows user-facing view
    Route::get('/my-reports/{ticket}', function ($ticket) {
        return view('my-report', ['ticket' => $ticket]);
    })->name('report.show');

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
        return redirect()->route('admin.overview');
    });

    Route::get('/overview', \App\Livewire\AdminOverview::class)->name('overview');
    Route::get('/dashboard', \App\Livewire\AdminModerationQueue::class)->name('dashboard');

    Route::get('/reports/{ticket}', \App\Livewire\ReportDetail::class)->name('reports.detail');
    
    // CMS Routes
    Route::get('/cms', \App\Livewire\AdminCmsList::class)->name('cms.index');
    Route::get('/cms/create', \App\Livewire\AdminCmsForm::class)->name('cms.create');
    Route::get('/cms/{article}/edit', \App\Livewire\AdminCmsForm::class)->name('cms.edit');
    
    // System & Tools
    Route::get('/map', \App\Livewire\AdminMap::class)->name('map');
    Route::get('/users', \App\Livewire\AdminUserList::class)->name('users');
    Route::get('/settings', \App\Livewire\AdminSettings::class)->name('settings');
    Route::get('/messages', \App\Livewire\AdminMessaging::class)->name('messages');
    Route::get('/chat-queue', \App\Livewire\AdminChatQueue::class)->name('chat-queue');
    Route::get('/volunteers', \App\Livewire\AdminVolunteerList::class)->name('volunteers');
    Route::get('/broadcast', \App\Livewire\AdminBroadcast::class)->name('broadcast');
    Route::get('/comments', \App\Livewire\AdminCommentModeration::class)->name('comments.index');
    Route::get('/audit-log', \App\Livewire\AdminAuditLog::class)->name('audit-log');
    Route::get('/news', \App\Livewire\AdminNewsManager::class)->name('news');

    Route::get('/reports/evidence/{id}/stream', function ($id) {
        $evidence = \App\Models\ReportEvidence::findOrFail($id);
        
        if (!auth()->user()->hasAnyRole(['super-admin', 'moderator'])) {
            abort(403);
        }

        $headers = [
            'Content-Type' => $evidence->mime_type,
            'Cache-Control' => 'no-store, no-cache',
        ];

        return response()->stream(function () use ($evidence) {
            $source = fopen(\Illuminate\Support\Facades\Storage::disk('local')->path($evidence->encrypted_path), 'rb');
            while (!feof($source)) {
                $line = fgets($source);
                if (trim($line) !== '') {
                    echo \Illuminate\Support\Facades\Crypt::decrypt($line);
                }
            }
            fclose($source);
        }, 200, $headers);
    })->name('reports.stream-evidence');

    Route::middleware('consent')->get('/export-reports', [ReportExportController::class, 'exportPdf'])->name('export');
});

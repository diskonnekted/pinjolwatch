<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Article;

$article = Article::find(21);
if ($article) {
    $content = $article->content;
    
    $target = "#### 🎓 Level Menengah (3-6 Bulan)
```
Bulan 4: Terapkan Anggaran 50/30/20
  → Alokasikan pendapatan sesuai kerangka
  → Review & adjust di akhir bulan

Bulan 5: Pelajari Manajemen Utang Sehat
  → Hitung rasio utang: cicilan/penghasilan ≤ 30%
  → Pelajari strategi avalanche vs snowball

Bulan 6: Eksplorasi Investasi Dasar
  → Pahami profil risiko: konservatif, moderat, agresif
  → Mulai investasi mikro (Rp10.000) di reksa dana pasar uang
```";

    $modernHtml = '<div class="my-10 space-y-6">
    <div class="flex items-center gap-3 mb-8">
        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
        </div>
        <h4 class="text-2xl font-black text-slate-800 dark:text-white tracking-tight uppercase italic">Level Menengah <span class="text-indigo-500">(3-6 Bulan)</span></h4>
    </div>
    
    <div class="grid md:grid-cols-3 gap-6">
        <div class="group relative bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-white/5 shadow-xl hover:shadow-2xl transition-all hover:-translate-y-1">
            <div class="absolute -top-4 -right-4 w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-black shadow-lg">04</div>
            <h5 class="text-lg font-black text-slate-800 dark:text-white mb-4 uppercase tracking-tighter">Anggaran 50/30/20</h5>
            <ul class="space-y-3">
                <li class="flex items-start gap-2 text-sm text-slate-600 dark:text-slate-400 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5"></span>
                    Alokasikan pendapatan sesuai kerangka
                </li>
                <li class="flex items-start gap-2 text-sm text-slate-600 dark:text-slate-400 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5"></span>
                    Review & adjust di akhir bulan
                </li>
            </ul>
        </div>

        <div class="group relative bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-white/5 shadow-xl hover:shadow-2xl transition-all hover:-translate-y-1">
            <div class="absolute -top-4 -right-4 w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-black shadow-lg">05</div>
            <h5 class="text-lg font-black text-slate-800 dark:text-white mb-4 uppercase tracking-tighter">Manajemen Utang</h5>
            <ul class="space-y-3">
                <li class="flex items-start gap-2 text-sm text-slate-600 dark:text-slate-400 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5"></span>
                    Hitung rasio utang ≤ 30%
                </li>
                <li class="flex items-start gap-2 text-sm text-slate-600 dark:text-slate-400 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5"></span>
                    Avalanche vs Snowball method
                </li>
            </ul>
        </div>

        <div class="group relative bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-white/5 shadow-xl hover:shadow-2xl transition-all hover:-translate-y-1">
            <div class="absolute -top-4 -right-4 w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-black shadow-lg">06</div>
            <h5 class="text-lg font-black text-slate-800 dark:text-white mb-4 uppercase tracking-tighter">Eksplorasi Investasi</h5>
            <ul class="space-y-3">
                <li class="flex items-start gap-2 text-sm text-slate-600 dark:text-slate-400 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5"></span>
                    Pahami profil risiko investasi
                </li>
                <li class="flex items-start gap-2 text-sm text-slate-600 dark:text-slate-400 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mt-1.5"></span>
                    Mulai investasi mikro (Rp10k)
                </li>
            </ul>
        </div>
    </div>
</div>';

    $newContent = str_replace($target, $modernHtml, $content);
    
    if ($newContent !== $content) {
        $article->update(['content' => $newContent]);
        echo "Modernized 'Level Menengah' section successfully.\n";
    } else {
        echo "Could not find the target section to replace.\n";
        // Let's try a more fuzzy search if direct replacement fails
    }
}

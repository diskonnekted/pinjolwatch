<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Article;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $article = Article::where('slug', 'literasi-keuangan-bukan-soal-jadi-kaya-raya-tapi-soal-tidur-nyenyak')->first();
        if ($article) {
            $content = $article->content;

            // Pattern for "Aksi Praktis" blocks
            $pattern = '/\*\*Aksi Praktis:\*\*\s+```[\s\S]*?```/';
            
            $content = preg_replace_callback($pattern, function($matches) {
                // Extract items
                $block = $matches[0];
                preg_match_all('/□ (.*)/', $block, $items);
                
                if (empty($items[1])) return $block;

                $html = '<div class="my-8 p-8 bg-slate-900/60 border border-teal-500/20 rounded-[2rem] not-prose shadow-2xl">
<p class="text-[10px] font-black text-teal-400 uppercase tracking-widest mb-6 flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
Langkah Nyata Hari Ini
</p>
<ul class="space-y-4">';

                foreach ($items[1] as $item) {
                    $html .= '
<li class="flex items-start gap-4 text-sm font-bold text-slate-300 leading-relaxed">
<div class="mt-0.5 w-6 h-6 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-500 shrink-0 shadow-lg shadow-teal-500/5">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
</div>
' . trim($item) . '
</li>';
                }

                $html .= '
</ul>
</div>';
                return $html;
            }, $content);

            $article->update(['content' => $content]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Article;
use Illuminate\Support\Str;

$filePath = __DIR__ . '/docs/fintech.md';
$rawContent = file_get_contents($filePath);

// Modernizing the content before insertion
$content = $rawContent;

// 1. Convert "Aksi Praktis" or code blocks with checklists into premium UI
$pattern = '/```[\s\S]*?```/';
$content = preg_replace_callback($pattern, function($matches) {
    $block = trim($matches[0], '`');
    $lines = explode("\n", trim($block));
    
    // Check if it's a checklist (starts with number or square)
    if (preg_match('/^[0-9\.]+|□/', $lines[0])) {
        $html = '<div class="my-8 p-8 bg-slate-900/60 border border-teal-500/20 rounded-[2rem] not-prose shadow-2xl">
<p class="text-[10px] font-black text-teal-400 uppercase tracking-widest mb-6 flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
Proses & Alur Kerja
</p>
<ul class="space-y-4">';

        foreach ($lines as $line) {
            $cleanLine = preg_replace('/^[0-9\.]+\s*|□\s*/', '', $line);
            if (empty(trim($cleanLine))) continue;
            
            $html .= '
<li class="flex items-start gap-4 text-sm font-bold text-slate-300 leading-relaxed">
<div class="mt-0.5 w-6 h-6 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-500 shrink-0 shadow-lg shadow-teal-500/5">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
</div>
' . trim($cleanLine) . '
</li>';
        }
        $html .= '</ul></div>';
        return $html;
    }
    
    // Otherwise keep as code block but style it
    return '<pre class="bg-slate-950 p-6 rounded-2xl border border-white/5 text-teal-300 text-sm font-mono overflow-x-auto shadow-inner"><code>' . htmlspecialchars(trim($block)) . '</code></pre>';
}, $content);

// 2. Wrap tables in glassmorphism containers
$content = preg_replace('/(\|.*\|)\n(\|[- |]*\|)\n((?:\|.*\|\n?)+)/', '<div class="overflow-x-auto my-10 rounded-[2rem] border border-white/5 shadow-2xl bg-slate-900/40 p-1 not-prose">
<table class="w-full text-left border-collapse">
$0
</table>
</div>', $content);

// Cleanup table tags (Str::markdown will handle the inside, but we need to ensure they don't get double wrapped poorly)
// We'll let Str::markdown handle the table conversion, but we wrap it in a styled div.

$title = "🔍 Bedah Lengkap Bisnis Pinjol: Dari Sistem IT, Asuransi, hingga Keuntungan";
$slug = Str::slug($title);

// Check if already exists
$article = Article::where('slug', $slug)->first();

$data = [
    'user_id' => 1, // Admin
    'title' => $title,
    'slug' => $slug,
    'content' => $content,
    'type' => 'education',
    'status' => 'published',
    'author_name' => 'Tim Edukasi PinjolWatch',
    'image_path' => null, // We can add one later
];

if ($article) {
    $article->update($data);
    echo "Article updated: $slug\n";
} else {
    Article::create($data);
    echo "Article created: $slug\n";
}

unlink(__FILE__);

<x-guest-layout>
<div class="min-h-screen bg-slate-950 flex flex-col items-center justify-center p-8 text-center">
    <div class="w-32 h-32 bg-slate-900 rounded-[2.5rem] flex items-center justify-center text-5xl mb-8 shadow-2xl border border-slate-800 animate-pulse">
        📡
    </div>
    <h1 class="text-4xl font-black text-white  uppercase tracking-tighter mb-4 grad">Anda Sedang Offline</h1>
    <p class="text-slate-400 text-lg max-w-md leading-relaxed mb-10">
        Maaf, koneksi internet Anda terputus. Namun, Anda tetap bisa mengakses panduan darurat yang telah tersimpan di ponsel Anda.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full max-w-lg">
        <a href="/menghadapi-dc" class="p-6 bg-slate-900 border border-slate-800 rounded-3xl hover:border-teal-500/50 transition-all text-left group">
            <span class="text-2xl mb-2 block">🛡️</span>
            <p class="text-xs font-black text-white uppercase tracking-wider">Panduan DC</p>
            <p class="text-[10px] text-slate-500 font-bold uppercase mt-1">Tersedia Offline</p>
        </a>
        <a href="/bantuan-mental" class="p-6 bg-slate-900 border border-slate-800 rounded-3xl hover:border-teal-500/50 transition-all text-left group">
            <span class="text-2xl mb-2 block">🧠</span>
            <p class="text-xs font-black text-white uppercase tracking-wider">Bantuan Mental</p>
            <p class="text-[10px] text-slate-500 font-bold uppercase mt-1">Tersedia Offline</p>
        </a>
    </div>

    <button onclick="window.location.reload()" class="mt-12 px-10 py-4 bg-teal-600 text-white font-black text-xs rounded-2xl uppercase tracking-widest hover:bg-teal-500 transition-all">
        Coba Hubungkan Kembali
    </button>
</div>
</x-guest-layout>

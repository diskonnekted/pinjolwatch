<div class="p-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-4xl font-black text-white tracking-tighter uppercase mb-2">Moderasi Komentar</h1>
            <p class="text-slate-500 text-sm font-medium">Kelola suara komunitas agar tetap aman dan edukatif.</p>
        </div>

        <div class="flex items-center gap-4">
            <select wire:model.live="statusFilter" class="bg-slate-900 border border-white/10 rounded-xl px-4 py-2 text-sm text-slate-300 focus:ring-teal-500 focus:border-teal-500">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
            
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari isi, user, atau artikel..." class="bg-slate-900 border border-white/10 rounded-xl px-4 py-2 text-sm text-slate-300 w-64 focus:ring-teal-500 focus:border-teal-500">
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm font-bold animate-pulse">
            {{ session('message') }}
        </div>
    @endif

    <div class="glass rounded-[2rem] overflow-hidden border border-white/5 shadow-2xl">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-white/5 border-b border-white/5">
                    <th class="p-6 text-[10px] font-black text-slate-500 uppercase tracking-widest">Pengirim & Artikel</th>
                    <th class="p-6 text-[10px] font-black text-slate-500 uppercase tracking-widest">Isi Komentar</th>
                    <th class="p-6 text-[10px] font-black text-slate-500 uppercase tracking-widest">Status</th>
                    <th class="p-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($comments as $comment)
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-white font-black">
                                    {{ substr($comment->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="text-sm font-black text-white">{{ $comment->user->name }}</div>
                                    <div class="text-[10px] text-slate-500 font-bold truncate max-w-[200px]">{{ $comment->article->title }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-6">
                            <div class="text-xs text-slate-400 leading-relaxed line-clamp-3 max-w-md">
                                {{ $comment->content }}
                            </div>
                            <div class="text-[9px] text-slate-600 mt-2 uppercase font-black tracking-widest">
                                {{ $comment->created_at->format('d M Y H:i') }}
                            </div>
                        </td>
                        <td class="p-6">
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-amber-500/10 text-amber-500 border-amber-500/20',
                                    'approved' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                                    'rejected' => 'bg-rose-500/10 text-rose-500 border-rose-500/20',
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border {{ $statusClasses[$comment->status] }}">
                                {{ $comment->status }}
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                @if($comment->status !== 'approved')
                                    <button wire:click="approve({{ $comment->id }})" class="p-2 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500 hover:text-white transition-all shadow-lg shadow-emerald-500/10" title="Approve">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </button>
                                @endif

                                @if($comment->status !== 'rejected')
                                    <button wire:click="reject({{ $comment->id }})" class="p-2 rounded-lg bg-amber-500/10 text-amber-500 hover:bg-amber-500 hover:text-white transition-all" title="Reject">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                    </button>
                                @endif

                                <button wire:click="delete({{ $comment->id }})" wire:confirm="Hapus komentar ini secara permanen?" class="p-2 rounded-lg bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white transition-all" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-20 text-center">
                            <div class="flex flex-col items-center gap-4 text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-16 h-16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.33.058.643.115.94.171v11.019a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.682c.297-.056.61-.113.94-.171a45.243 45.243 0 0 1 18.615 0ZM9 13h6m-1.5 3h.008v.008H13.5V16Zm-6.75-6.152V4.845a2.25 2.25 0 0 1 1.108-1.935l7.5-4.364a2.25 2.25 0 0 1 2.284 0l7.5 4.364a2.25 2.25 0 0 1 1.108 1.935v5.007c0 .115-.002.23-.006.345a44.698 44.698 0 0 0-18.484 0c-.004-.115-.006-.23-.006-.345Z" />
                                </svg>
                                <p class="font-black uppercase tracking-widest text-xs">Tidak ada komentar ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($comments->hasPages())
            <div class="p-6 bg-white/5 border-t border-white/5">
                {{ $comments->links() }}
            </div>
        @endif
    </div>
</div>

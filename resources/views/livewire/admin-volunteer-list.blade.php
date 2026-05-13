<div class="p-8">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-3xl font-black text-white uppercase italic tracking-tighter">Manajemen Relawan</h1>
            <p class="text-slate-500 text-sm font-bold uppercase tracking-widest mt-1">Review dan kelola calon pengelola website</p>
        </div>
        <div class="flex gap-4">
            <input wire:model.live="search" type="text" placeholder="Cari nama/email..." class="bg-slate-900 border-slate-800 rounded-xl px-4 py-2 text-sm text-slate-300 focus:ring-teal-500 w-64">
            <select wire:model.live="statusFilter" class="bg-slate-900 border-slate-800 rounded-xl px-4 py-2 text-sm text-slate-300 focus:ring-teal-500">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="reviewed">Reviewed</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-teal-500/10 border border-teal-500/20 rounded-xl text-teal-400 text-sm font-bold">
            {{ session('message') }}
        </div>
    @endif

    <div class="glass overflow-hidden rounded-3xl border-slate-800">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-900/50 border-b border-slate-800">
                    <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Calon Relawan</th>
                    <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Minat Peran</th>
                    <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Keahlian & Motivasi</th>
                    <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Komitmen</th>
                    <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Status</th>
                    <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/50">
                @foreach($applications as $app)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-white">{{ $app->full_name }}</div>
                            <div class="text-[10px] text-slate-500 mt-1 uppercase tracking-wider">{{ $app->email }}</div>
                            <div class="text-[10px] text-teal-500 mt-0.5 font-black">{{ $app->whatsapp }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-slate-800 rounded-full text-[10px] font-black text-slate-300 uppercase tracking-widest">
                                {{ $app->role_interest }}
                            </span>
                        </td>
                        <td class="px-6 py-4 max-w-xs">
                            <div class="text-xs text-slate-400 line-clamp-1 font-medium italic">"{{ $app->skills }}"</div>
                            <div class="text-[10px] text-slate-600 line-clamp-1 mt-1">{{ $app->motivation }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs font-bold text-slate-300">{{ $app->commitment_hours }} Jam/Minggu</div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-amber-500/10 text-amber-500 border-amber-500/20',
                                    'reviewed' => 'bg-blue-500/10 text-blue-500 border-blue-500/20',
                                    'approved' => 'bg-teal-500/10 text-teal-500 border-teal-500/20',
                                    'rejected' => 'bg-rose-500/10 text-rose-500 border-rose-500/20',
                                ];
                            @endphp
                            <span class="px-3 py-1 border rounded-full text-[9px] font-black uppercase tracking-widest {{ $statusClasses[$app->status] ?? '' }}">
                                {{ $app->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <select onchange="window.Livewire.find('{{ $_instance->getId() }}').updateStatus({{ $app->id }}, this.value)" class="bg-slate-800 border-none rounded-lg text-[9px] font-black uppercase text-slate-300 py-1 px-2 focus:ring-teal-500">
                                    <option value="">Update Status</option>
                                    <option value="reviewed">Review</option>
                                    <option value="approved">Approve</option>
                                    <option value="rejected">Reject</option>
                                </select>
                                <button onclick="confirm('Hapus aplikasi ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $app->id }})" class="p-1.5 bg-rose-500/10 text-rose-500 rounded-lg hover:bg-rose-500 hover:text-white transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 bg-slate-900/30">
            {{ $applications->links() }}
        </div>
    </div>
</div>

<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
    {{-- Header Section --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-50 text-primary-700 text-xs font-bold tracking-widest uppercase mb-3 border border-primary-100">
                <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                Administrator
            </div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Antrean <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-cyan-600">Moderasi</span></h2>
            <p class="text-slate-500 mt-1 text-sm">Tinjau, verifikasi, dan teruskan laporan masyarakat ke otoritas terkait.</p>
        </div>
        
        {{-- Flash Message --}}
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl shadow-sm flex items-center gap-3 animate-fade-in-down">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-emerald-500"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                <span class="text-sm font-semibold">{{ session('message') }}</span>
            </div>
        @endif
    </div>

    {{-- Main Panel --}}
    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden relative z-10">
        
        {{-- Toolbar (Search & Filters) --}}
        <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="relative w-full sm:w-96">
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari tiket, aplikasi, atau kronologi..." class="w-full pl-11 pr-4 py-3 bg-white border-slate-200 rounded-xl text-sm font-medium text-slate-700 placeholder-slate-400 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all shadow-sm">
                <div class="absolute left-4 top-3.5 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196 7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                </div>
            </div>
            <div class="w-full sm:w-auto relative">
                <select wire:model.live="statusFilter" class="w-full sm:w-48 appearance-none pl-4 pr-10 py-3 bg-white border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all shadow-sm cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="received">Received</option>
                    <option value="verified">Verified</option>
                    <option value="forwarded">Forwarded</option>
                    <option value="resolved">Resolved</option>
                </select>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-white border-b border-slate-100">
                        <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Tiket & Waktu</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Lokasi & Klasifikasi</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Entitas Aplikasi</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest text-right">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($reports as $report)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            {{-- Column 1: Ticket --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-500 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M1 4.75C1 3.784 1.784 3 2.75 3h14.5c.966 0 1.75.784 1.75 1.75v10.5A1.75 1.75 0 0 1 17.25 17H2.75A1.75 1.75 0 0 1 1 15.25V4.75ZM2.75 4.5a.25.25 0 0 0-.25.25v10.5c0 .138.112.25.25.25h14.5a.25.25 0 0 0 .25-.25V4.75a.25.25 0 0 0-.25-.25H2.75ZM4 7a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 7Zm0 3.5a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75a.75.75 0 0 1-.75-.75Zm0 3.5a.75.75 0 0 1 .75-.75h6.5a.75.75 0 0 1 0 1.5h-6.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" /></svg>
                                    </div>
                                    <div>
                                        <div class="font-mono font-bold text-slate-900 text-sm tracking-tight">{{ $report->ticket_id }}</div>
                                        <div class="text-[11px] font-medium text-slate-500 mt-0.5 flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                            {{ $report->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Column 2: Location & Threat --}}
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-slate-700">{{ $report->kabupaten->nama }}</div>
                                <div class="inline-flex mt-1">
                                    <span class="px-2 py-0.5 rounded border border-red-100 bg-red-50 text-[10px] font-bold text-red-600 uppercase tracking-widest">{{ $report->threatType->label }}</span>
                                </div>
                            </td>

                            {{-- Column 3: App Name --}}
                            <td class="px-6 py-4">
                                @if($report->legalPinjol)
                                    <div class="inline-flex flex-col items-start">
                                        <div class="text-sm font-bold text-slate-900">{{ $report->legalPinjol->app_name }}</div>
                                        <div class="inline-flex items-center gap-1 mt-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest">Terdaftar OJK</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="inline-flex flex-col items-start">
                                        <div class="text-sm font-bold text-slate-900">{{ $report->app_name ?: 'Tidak Disebutkan' }}</div>
                                        <div class="inline-flex items-center gap-1 mt-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                            <span class="text-[10px] font-bold text-rose-600 uppercase tracking-widest">Ilegal / Bodong</span>
                                        </div>
                                    </div>
                                @endif
                            </td>

                            {{-- Column 4: Status --}}
                            <td class="px-6 py-4 text-center">
                                @php
                                    $statusConfig = [
                                        'received' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-800', 'border' => 'border-amber-200', 'dot' => 'bg-amber-500'],
                                        'verified' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'border' => 'border-blue-200', 'dot' => 'bg-blue-500'],
                                        'forwarded' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800', 'border' => 'border-purple-200', 'dot' => 'bg-purple-500'],
                                        'resolved' => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-800', 'border' => 'border-emerald-200', 'dot' => 'bg-emerald-500'],
                                    ];
                                    $config = $statusConfig[$report->status] ?? $statusConfig['received'];
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider border {{ $config['bg'] }} {{ $config['text'] }} {{ $config['border'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $config['dot'] }}"></span>
                                    {{ $report->status }}
                                </span>
                            </td>

                            {{-- Column 5: Actions --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2 opacity-50 group-hover:opacity-100 transition-opacity">
                                    {{-- View Button --}}
                                    <a href="{{ route('admin.reports.detail', ['ticket' => $report->ticket_id]) }}" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-primary-600 hover:border-primary-300 hover:bg-primary-50 shadow-sm transition-all" title="Detail Laporan">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" /><path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>
                                    </a>
                                    
                                    {{-- Status Actions --}}
                                    @if($report->status == 'received')
                                        <button wire:click="updateStatus({{ $report->id }}, 'verified')" class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 border border-blue-200 text-blue-600 hover:bg-blue-600 hover:text-white hover:border-blue-600 shadow-sm transition-all" title="Verifikasi">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" /></svg>
                                        </button>
                                    @elseif($report->status == 'verified')
                                        <button wire:click="updateStatus({{ $report->id }}, 'forwarded')" class="w-8 h-8 flex items-center justify-center rounded-lg bg-purple-50 border border-purple-200 text-purple-600 hover:bg-purple-600 hover:text-white hover:border-purple-600 shadow-sm transition-all" title="Teruskan ke Otoritas">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" /></svg>
                                        </button>
                                    @elseif($report->status == 'forwarded')
                                        <button wire:click="updateStatus({{ $report->id }}, 'resolved')" class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-600 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 shadow-sm transition-all" title="Tandai Selesai">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                                        </button>
                                    @endif

                                    {{-- OJK Preview Button (ShortCut) --}}
                                    @if($report->ojk_submitted_at)
                                        <button wire:click="previewOjk({{ $report->id }})" class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-50 border border-indigo-200 text-indigo-600 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 shadow-sm transition-all" title="Pratinjau Dokumen OJK">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path d="M5.127 3.502L5.25 3.5h9.5c.38 0 .726.154.975.402A1.375 1.375 0 0116 4.875V15.125c0 .38-.154.726-.402.975a1.375 1.375 0 01-.973.4h-9.5a1.375 1.375 0 01-.975-.402A1.375 1.375 0 014 15.125V4.875c0-.38.154-.726.402-.975A1.375 1.375 0 015.127 3.502zM13 3.5v2a.5.5 0 01-.5.5H10V3.5h3z" /></svg>
                                        </button>
                                    @endif

                                    {{-- Delete Button --}}
                                    <button wire:click="deleteReport({{ $report->id }})" wire:confirm="Anda yakin ingin menghapus laporan ini? Tindakan ini tidak bisa dibatalkan." class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-rose-500 hover:bg-rose-500 hover:text-white hover:border-rose-500 shadow-sm transition-all" title="Hapus Laporan">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" /></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-300 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
                                    </div>
                                    <h4 class="text-sm font-bold text-slate-900">Tidak Ada Laporan Ditemukan</h4>
                                    <p class="text-xs text-slate-500 mt-1">Coba sesuaikan pencarian atau filter status Anda.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
            {{ $reports->links() }}
        </div>
    </div>

    {{-- OJK Document Preview Modal --}}
    @if($showOjkPreview && $selectedReport)
        <div class="fixed inset-0 z-[110] overflow-y-auto" x-transition>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="fixed inset-0 bg-slate-900/80 backdrop-blur-md" wire:click="closePreview"></div>
                
                <div class="relative bg-white w-full max-w-4xl rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col h-[90vh]">
                    {{-- Modal Header --}}
                    <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div>
                            <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight">Arsip Dokumen <span class="text-primary-600">OJK</span></h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tiket: #{{ $selectedReport->ticket_id }} • Dikirim: {{ $selectedReport->ojk_submitted_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <button wire:click="closePreview" class="p-2 hover:bg-slate-200 rounded-full transition-colors text-slate-400 hover:text-slate-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>

                    {{-- Document Viewer --}}
                    <div class="flex-1 overflow-y-auto p-10 bg-slate-100 custom-scrollbar">
                        <div class="bg-white shadow-lg mx-auto p-12 min-h-[1000px] w-full max-w-[800px] border border-slate-200 text-black">
                            @include('reports.ojk-submission', ['report' => $selectedReport])
                        </div>
                    </div>

                    {{-- Modal Footer Actions --}}
                    <div class="p-6 border-t border-slate-100 bg-white flex items-center justify-end gap-3">
                        <button wire:click="closePreview" class="px-8 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-2xl font-black text-xs uppercase tracking-widest transition-all">Tutup Arsip</button>
                        <a href="{{ route('admin.reports.detail', ['ticket' => $selectedReport->ticket_id]) }}" class="px-8 py-3 bg-primary-600 hover:bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-primary-500/20">
                            Buka Detail Laporan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

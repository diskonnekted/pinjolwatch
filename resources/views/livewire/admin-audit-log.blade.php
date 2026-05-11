<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-3">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-600 transition-colors">Admin</a>
                <span>/</span>
                <span class="text-slate-800 font-bold">Audit Log</span>
            </div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                Rekam Jejak <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-cyan-600">Aktivitas Sistem</span>
            </h2>
            <p class="text-slate-500 mt-2 text-sm">Log keamanan yang mencatat setiap aktivitas krusial yang dilakukan administrator.</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        {{-- Toolbar Filter --}}
        <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="w-full md:w-96 relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-3 top-2.5 text-slate-400"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari rute, admin, atau URL..." class="w-full pl-10 pr-4 py-2 border-slate-200 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm">
            </div>
            
            <div class="flex items-center gap-3 w-full md:w-auto">
                <select wire:model.live="filterMethod" class="w-full md:w-40 border-slate-200 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm font-bold">
                    <option value="">Semua Method</option>
                    <option value="GET">GET</option>
                    <option value="POST">POST</option>
                    <option value="PATCH">PATCH</option>
                    <option value="DELETE">DELETE</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400 border-b border-slate-100">Waktu & User</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400 border-b border-slate-100">Aktivitas (Route)</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400 border-b border-slate-100">HTTP & IP</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400 border-b border-slate-100">Payload Summary</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($logs as $log)
                        <tr class="hover:bg-slate-50/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-900 text-sm">{{ $log->created_at->format('H:i:s') }}</div>
                                <div class="text-[10px] text-slate-500 font-medium uppercase tracking-tight">{{ $log->created_at->format('d M Y') }}</div>
                                <div class="mt-2 flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-primary-100 flex items-center justify-center text-primary-700 text-[10px] font-black uppercase border border-primary-200">
                                        {{ substr($log->user?->name ?? '?', 0, 1) }}
                                    </div>
                                    <span class="text-xs font-bold text-slate-700">{{ $log->user?->name ?? 'System' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="inline-flex px-2 py-0.5 rounded bg-slate-100 text-slate-700 text-[10px] font-black uppercase tracking-tighter mb-1 border border-slate-200">
                                    {{ $log->route_name }}
                                </div>
                                <div class="text-[10px] text-slate-400 font-mono break-all line-clamp-1" title="{{ $log->url }}">
                                    {{ $log->url }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $methodColors = [
                                        'GET' => 'bg-blue-50 text-blue-700 border-blue-100',
                                        'POST' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                        'PATCH' => 'bg-amber-50 text-amber-700 border-amber-100',
                                        'DELETE' => 'bg-rose-50 text-rose-700 border-rose-100',
                                    ];
                                @endphp
                                <span class="px-2 py-0.5 rounded text-[10px] font-black border {{ $methodColors[$log->http_method] ?? 'bg-slate-100' }}">
                                    {{ $log->http_method }}
                                </span>
                                <div class="mt-2 flex items-center gap-1.5 text-[10px] text-slate-500 font-mono">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" /></svg>
                                    {{ $log->ip_masked }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="bg-slate-900 rounded-xl p-3 font-mono text-[10px] text-primary-400 overflow-x-auto max-w-xs md:max-w-md">
                                    @if(is_array($log->payload_summary))
                                        <div class="space-y-1">
                                            @foreach($log->payload_summary as $key => $val)
                                                <div><span class="text-slate-500">"{{ $key }}":</span> <span class="text-white">"{{ Str::limit($val, 50) }}"</span></div>
                                            @endforeach
                                        </div>
                                    @else
                                        {{ $log->payload_summary }}
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center justify-center gap-3">
                                    <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center text-slate-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375c0 .621-.504 1.125-1.125 1.125H6.375C5.754 20.25 5.25 19.746 5.25 19.125V9.375c0-.621.504-1.125 1.125-1.125Z" /></svg>
                                    </div>
                                    <p class="text-slate-400 font-medium italic">Tidak ada rekam jejak yang ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $logs->links() }}
        </div>
    </div>
</div>

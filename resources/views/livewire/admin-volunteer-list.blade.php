<div class="relative min-h-screen bg-[#020617] text-slate-100 font-inter overflow-hidden">
    {{-- Decorative Background Elements --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-teal-500/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute top-1/2 -right-24 w-80 h-80 bg-indigo-500/10 rounded-full blur-[100px] animate-bounce-slow"></div>
    </div>

    <div class="relative z-10 p-8 lg:p-12">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="px-3 py-1 bg-teal-500/10 text-teal-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-full border border-teal-500/20">
                        Administration
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-white uppercase  tracking-tighter leading-none">
                    Manajemen <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-cyan-500">Relawan</span>
                </h1>
                <p class="text-slate-400 text-sm font-medium mt-4 max-w-xl">
                    Review dan kelola aplikasi calon kontributor yang ingin bergabung dalam gerakan perlawanan terhadap predator finansial.
                </p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-slate-500 group-focus-within:text-teal-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input wire:model.live="search" type="text" placeholder="Cari nama atau email..." 
                        class="w-full sm:w-72 bg-slate-900/50 border-slate-800 rounded-2xl pl-11 pr-4 py-3 text-sm text-slate-200 focus:ring-2 focus:ring-teal-500/50 focus:border-teal-500 transition-all backdrop-blur-md">
                </div>
                
                <select wire:model.live="statusFilter" 
                    class="bg-slate-900/50 border-slate-800 rounded-2xl px-4 py-3 text-sm text-slate-200 focus:ring-2 focus:ring-teal-500/50 focus:border-teal-500 transition-all backdrop-blur-md appearance-none cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="pending">⏳ Pending</option>
                    <option value="reviewed">👀 Reviewed</option>
                    <option value="approved">✅ Approved</option>
                    <option value="rejected">❌ Rejected</option>
                </select>
            </div>
        </div>

        {{-- Summary Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            @php
                $allCount = \App\Models\VolunteerApplication::count();
                $pendingCount = \App\Models\VolunteerApplication::where('status', 'pending')->count();
                $approvedCount = \App\Models\VolunteerApplication::where('status', 'approved')->count();
            @endphp
            <div class="glass p-6 rounded-3xl border-white/5 group hover:border-teal-500/30 transition-all duration-500">
                <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Total Aplikasi</div>
                <div class="text-3xl font-black text-white  tracking-tighter">{{ $allCount }}</div>
            </div>
            <div class="glass p-6 rounded-3xl border-white/5 group hover:border-amber-500/30 transition-all duration-500">
                <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Menunggu Review</div>
                <div class="text-3xl font-black text-amber-400  tracking-tighter">{{ $pendingCount }}</div>
            </div>
            <div class="glass p-6 rounded-3xl border-white/5 group hover:border-teal-500/30 transition-all duration-500">
                <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Sudah Disetujui</div>
                <div class="text-3xl font-black text-teal-400  tracking-tighter">{{ $approvedCount }}</div>
            </div>
            <div class="glass p-6 rounded-3xl border-white/5 group hover:border-indigo-500/30 transition-all duration-500 text-center flex items-center justify-center">
                <div class="text-[10px] font-black text-teal-500 uppercase tracking-widest animate-pulse">Live Update Active</div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="mb-8 p-4 bg-teal-500/10 border border-teal-500/20 rounded-2xl text-teal-400 text-sm font-bold flex items-center gap-3 animate-fade-in">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('message') }}
            </div>
        @endif

        {{-- Applications List --}}
        <div class="space-y-6">
            @forelse($applications as $app)
                <div class="group relative">
                    {{-- Hover Border Effect --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-teal-500 to-indigo-600 rounded-[2rem] blur opacity-0 group-hover:opacity-15 transition duration-1000 group-hover:duration-200"></div>
                    
                    <div class="relative glass rounded-[2rem] border-white/5 p-6 md:p-8 flex flex-col lg:flex-row items-center gap-8 transition-all duration-500 group-hover:bg-slate-900/60">
                        
                        {{-- Profile Info --}}
                        <div class="flex-1 min-w-0 w-full">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center text-2xl font-black text-teal-500 shadow-xl border border-white/5">
                                    {{ substr($app->full_name, 0, 1) }}
                                </div>
                                <div>
                                    <h3 class="text-xl font-black text-white  tracking-tight">{{ $app->full_name }}</h3>
                                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1">
                                        <span class="text-xs text-slate-400 font-medium flex items-center gap-1">
                                            <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                            {{ $app->email }}
                                        </span>
                                        <span class="text-xs text-teal-500 font-bold flex items-center gap-1">
                                            <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                            {{ $app->whatsapp }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                <div>
                                    <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Keahlian & Pengalaman</div>
                                    <p class="text-sm text-slate-300  font-medium leading-relaxed">
                                        "{{ $app->skills }}"
                                    </p>
                                </div>
                                <div>
                                    <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Motivasi Bergabung</div>
                                    <p class="text-sm text-slate-400 line-clamp-2">
                                        {{ $app->motivation }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Role & Commitment --}}
                        <div class="w-full lg:w-48 shrink-0 flex lg:flex-col justify-between items-center lg:items-start gap-4">
                            <div>
                                <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Minat Peran</div>
                                <span class="px-4 py-1.5 bg-indigo-500/10 text-indigo-400 text-[10px] font-black uppercase tracking-widest rounded-xl border border-indigo-500/20 block text-center">
                                    {{ $app->role_interest }}
                                </span>
                            </div>
                            <div class="text-right lg:text-left">
                                <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Komitmen</div>
                                <div class="text-lg font-black text-white  tracking-tighter">{{ $app->commitment_hours }} Jam<span class="text-xs text-slate-500 font-bold ml-1 uppercase">/Minggu</span></div>
                            </div>
                        </div>

                        {{-- Status & Actions --}}
                        <div class="w-full lg:w-64 shrink-0 flex flex-col gap-4">
                            <div>
                                <div class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Status Aplikasi</div>
                                @php
                                    $statusConfig = [
                                        'pending' => ['bg' => 'bg-amber-500/10', 'text' => 'text-amber-500', 'border' => 'border-amber-500/20', 'label' => 'Menunggu Review'],
                                        'reviewed' => ['bg' => 'bg-blue-500/10', 'text' => 'text-blue-500', 'border' => 'border-blue-500/20', 'label' => 'Dalam Review'],
                                        'approved' => ['bg' => 'bg-teal-500/10', 'text' => 'text-teal-500', 'border' => 'border-teal-500/20', 'label' => 'Diterima'],
                                        'rejected' => ['bg' => 'bg-rose-500/10', 'text' => 'text-rose-500', 'border' => 'border-rose-500/20', 'label' => 'Ditolak'],
                                    ];
                                    $cfg = $statusConfig[$app->status] ?? $statusConfig['pending'];
                                @endphp
                                <div class="px-4 py-2 border rounded-2xl text-[10px] font-black uppercase tracking-widest flex items-center justify-center gap-2 {{ $cfg['bg'] }} {{ $cfg['text'] }} {{ $cfg['border'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $cfg['text'] }} bg-current animate-pulse"></span>
                                    {{ $cfg['label'] }}
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <div class="relative flex-1">
                                    <select onchange="window.Livewire.find('{{ $_instance->getId() }}').updateStatus({{ $app->id }}, this.value)" 
                                        class="w-full bg-slate-800/80 border-white/5 rounded-xl text-[10px] font-black uppercase text-slate-200 py-3 px-4 focus:ring-teal-500 appearance-none cursor-pointer">
                                        <option value="">Aksi Status</option>
                                        <option value="reviewed">Review</option>
                                        <option value="approved">Approve</option>
                                        <option value="rejected">Reject</option>
                                    </select>
                                </div>
                                <button onclick="confirm('Hapus aplikasi ini selamanya?') || event.stopImmediatePropagation()" 
                                    wire:click="delete({{ $app->id }})" 
                                    class="p-3 bg-rose-500/10 text-rose-500 rounded-xl hover:bg-rose-500 hover:text-white transition-all duration-300 border border-rose-500/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="glass p-20 rounded-[3rem] text-center border-dashed border-white/10">
                    <div class="w-20 h-20 bg-slate-900 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-black text-white uppercase  tracking-tighter">Tidak ada aplikasi ditemukan</h3>
                    <p class="text-slate-500 text-sm mt-2 font-bold uppercase tracking-widest">Coba ubah filter atau kata kunci pencarian Anda</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $applications->links() }}
        </div>
    </div>

    <style>
        .animate-bounce-slow {
            animation: bounce 6s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(-5%); animation-timing-function: cubic-bezier(0.8,0,1,1); }
            50% { transform: none; animation-timing-function: cubic-bezier(0,0,0.2,1); }
        }
    </style>
</div>

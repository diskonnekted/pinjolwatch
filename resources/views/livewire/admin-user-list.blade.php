<div class="p-6 lg:p-10 space-y-10 min-h-screen">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 text-teal-400 text-[10px] font-black tracking-widest uppercase mb-3 border border-teal-500/20">
                <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                User Management System
            </div>
            <h1 class="text-4xl font-black text-white tracking-tighter uppercase italic">
                Pengguna & <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-indigo-400">Akses</span>
            </h1>
            <p class="text-slate-500 font-bold text-sm mt-1">Kelola hak akses, peran, dan identitas pengguna PinjolWatch secara terukur.</p>
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <button wire:click="openCreateModal" class="flex items-center gap-2 px-6 py-3 bg-teal-500 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-teal-600 shadow-lg shadow-teal-500/20 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Tambah Pengguna
            </button>

            <div class="relative group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-teal-400 transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607z" />
                </svg>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari nama atau email..." class="w-full md:w-64 pl-12 pr-4 py-3 bg-slate-900/50 border-white/5 rounded-2xl focus:ring-teal-500 focus:border-teal-500 text-sm font-medium text-white placeholder-slate-600 shadow-2xl transition-all">
            </div>

            <select wire:model.live="role" class="py-3 px-4 bg-slate-900/50 border-white/5 rounded-2xl text-sm font-black uppercase tracking-widest text-slate-400 focus:ring-teal-500 focus:border-teal-500 cursor-pointer hover:bg-slate-900 transition-all">
                <option value="">Semua Peran</option>
                @foreach($availableRoles as $r)
                    <option value="{{ $r->name }}">{{ strtoupper($r->name) }}</option>
                @endforeach
            </select>

            <select wire:model.live="status" class="py-3 px-4 bg-slate-900/50 border-white/5 rounded-2xl text-sm font-black uppercase tracking-widest text-slate-400 focus:ring-teal-500 focus:border-teal-500 cursor-pointer hover:bg-slate-900 transition-all">
                <option value="">Semua Status</option>
                <option value="verified">Terverifikasi</option>
                <option value="unverified">Belum Verifikasi</option>
            </select>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl text-sm font-bold animate-fade-in">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 p-4 bg-rose-50 border border-rose-100 text-rose-700 rounded-2xl text-sm font-bold animate-fade-in">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-slate-900/40 backdrop-blur-xl rounded-[2.5rem] border border-white/5 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/[0.02] border-b border-white/5">
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest">
                            <button wire:click="sortBy('name')" class="flex items-center gap-1 hover:text-teal-400 transition-colors">
                                Pengguna
                                @if($sortField === 'name')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}" />
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Peran</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Progress Pemulihan</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">
                            <button wire:click="sortBy('created_at')" class="flex items-center gap-1 mx-auto hover:text-teal-400 transition-colors">
                                Bergabung
                                @if($sortField === 'created_at')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}" />
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.03]">
                    @forelse($users as $user)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-teal-500/10 flex items-center justify-center text-teal-400 font-black text-sm overflow-hidden border border-teal-500/20 shadow-inner shrink-0 group-hover:scale-105 transition-transform">
                                        @if($user->avatar_url)
                                            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                        @else
                                            {{ substr($user->name, 0, 1) }}
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-sm font-black text-white leading-none mb-1.5">{{ $user->name }}</div>
                                        <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex flex-wrap justify-center gap-1.5">
                                    @foreach($user->roles as $role)
                                        <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase tracking-tighter {{ $role->name === 'super-admin' ? 'bg-rose-500/10 text-rose-400 border border-rose-500/20' : 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20' }}">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-8 py-6 text-center">
                                @if($user->email_verified_at)
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase tracking-tighter border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Verified
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-500/10 text-amber-400 text-[10px] font-black uppercase tracking-tighter border border-amber-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-6">
                                @php
                                    $completedCount = $user->recoveryProgress->whereNotNull('completed_at')->count();
                                    $percentage = $totalStages > 0 ? round(($completedCount / $totalStages) * 100) : 0;
                                @endphp
                                <div class="max-w-[140px] mx-auto">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-[9px] font-black text-slate-500 uppercase tracking-tighter">{{ $completedCount }}/{{ $totalStages }} Fase</span>
                                        <span class="text-[9px] font-black text-teal-400">{{ $percentage }}%</span>
                                    </div>
                                    <div class="w-full bg-white/5 h-2 rounded-full overflow-hidden border border-white/5 p-0.5">
                                        <div class="bg-gradient-to-r from-teal-500 to-indigo-500 h-full rounded-full transition-all duration-700 shadow-[0_0_10px_rgba(20,184,166,0.3)]" style="width: {{ $percentage }}%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-center text-[10px] font-bold text-slate-500 uppercase tracking-widest">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all transform translate-x-2 group-hover:translate-x-0">
                                    <button wire:click="openEditModal({{ $user->id }})" class="p-2.5 bg-white/5 text-slate-400 hover:bg-teal-500 hover:text-white rounded-xl transition-all shadow-lg hover:shadow-teal-500/20" title="Edit User">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                    <button wire:click="openResetModal({{ $user->id }})" class="p-2.5 bg-white/5 text-slate-400 hover:bg-amber-500 hover:text-white rounded-xl transition-all shadow-lg hover:shadow-amber-500/20" title="Reset Password">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                        </svg>
                                    </button>
                                    <button onclick="confirm('Hapus pengguna ini?') || event.stopImmediatePropagation()" wire:click="deleteUser({{ $user->id }})" class="p-2.5 bg-white/5 text-slate-400 hover:bg-rose-500 hover:text-white rounded-xl transition-all shadow-lg hover:shadow-rose-500/20" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.34 12.142m-4.204 0L9.412 9m9.965-3.682c.151-.033.302-.066.453-.098l.372-.083a.487.487 0 0 0 .33-.625.487.487 0 0 0-.625-.332l-.372.083a12.164 12.164 0 0 0-3.32 1.123M18.65 19.071A9.723 9.723 0 0 1 15 21a9.723 9.723 0 0 1-3.65-1.929M6.412 5.318A12.163 12.163 0 0 0 3.09 4.195a.487.487 0 0 0-.625.332.487.487 0 0 0 .33.625l.372.083c.151.033.302.066.453.098m10.724 13.738A9.723 9.723 0 0 1 11 21a9.723 9.723 0 0 1-3.738-1.724M15 9V5.25A2.25 2.25 0 0 0 12.75 3h-1.5A2.25 2.25 0 0 0 9 5.25V9m6 0H9" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-20 text-center opacity-30">
                                <p class="text-[10px] font-black uppercase tracking-widest">Tidak ada pengguna ditemukan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8">
        {{ $users->links() }}
    </div>

    {{-- Edit User Modal --}}
    @if($isEditModalOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm animate-fade-in">
        <div class="bg-slate-900 rounded-[2.5rem] w-full max-w-md overflow-hidden shadow-2xl border border-white/10">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-black text-white tracking-tighter uppercase italic">Edit Pengguna</h2>
                    <button wire:click="$set('isEditModalOpen', false)" class="text-slate-500 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <form wire:submit.prevent="updateUser" class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                        <input wire:model="editingName" type="text" class="w-full px-5 py-4 bg-slate-950 border-white/5 rounded-2xl text-sm font-bold text-white focus:ring-teal-500 focus:border-teal-500 transition-all">
                        @error('editingName') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">Alamat Email</label>
                        <input wire:model="editingEmail" type="email" class="w-full px-5 py-4 bg-slate-950 border-white/5 rounded-2xl text-sm font-bold text-white focus:ring-teal-500 focus:border-teal-500 transition-all">
                        @error('editingEmail') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">Peran Akses</label>
                        <div class="flex flex-wrap gap-2 p-3 bg-slate-950 rounded-2xl border border-white/5">
                            @foreach($availableRoles as $role)
                                <label class="flex items-center gap-2 px-3 py-2 rounded-xl cursor-pointer hover:bg-white/5 transition-all">
                                    <input type="checkbox" wire:model="editingRoles" value="{{ $role->name }}" class="rounded bg-slate-800 border-white/10 text-teal-500 focus:ring-teal-500">
                                    <span class="text-[10px] font-black uppercase tracking-tight text-slate-400">{{ $role->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-teal-600 text-white rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-teal-700 shadow-xl shadow-teal-600/20 transition-all">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    {{-- Reset Password Modal --}}
    @if($isResetModalOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm animate-fade-in">
        <div class="bg-slate-900 rounded-[2.5rem] w-full max-w-sm overflow-hidden shadow-2xl border border-white/10">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-black text-white tracking-tighter uppercase italic">Reset Password</h2>
                    <button wire:click="$set('isResetModalOpen', false)" class="text-slate-500 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="mb-6 p-4 bg-amber-500/10 rounded-2xl border border-amber-500/20">
                    <p class="text-[10px] font-bold text-amber-400 uppercase tracking-tight leading-relaxed">
                        Tindakan ini akan mengganti password pengguna secara paksa. Berikan password baru kepada pengguna setelah berhasil.
                    </p>
                </div>

                <form wire:submit.prevent="saveNewPassword" class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">Password Baru</label>
                        <input wire:model="newPassword" type="password" placeholder="Minimal 8 karakter" class="w-full px-5 py-4 bg-slate-950 border-white/5 rounded-2xl text-sm font-bold text-white focus:ring-amber-500 focus:border-amber-500 transition-all">
                        @error('newPassword') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-amber-600 text-white rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-amber-700 shadow-xl shadow-amber-600/20 transition-all">
                            Konfirmasi Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Create User Modal --}}
    @if($isCreateModalOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm animate-fade-in">
        <div class="bg-slate-900 rounded-[2.5rem] w-full max-w-md overflow-hidden shadow-2xl border border-white/10">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-black text-white tracking-tighter uppercase italic">Tambah Pengguna</h2>
                    <button wire:click="$set('isCreateModalOpen', false)" class="text-slate-500 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <form wire:submit.prevent="createUser" class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                        <input wire:model="newName" type="text" placeholder="Masukkan nama lengkap" class="w-full px-5 py-4 bg-slate-950 border-white/5 rounded-2xl text-sm font-bold text-white focus:ring-teal-500 focus:border-teal-500 transition-all">
                        @error('newName') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">Alamat Email</label>
                        <input wire:model="newEmail" type="email" placeholder="nama@email.com" class="w-full px-5 py-4 bg-slate-950 border-white/5 rounded-2xl text-sm font-bold text-white focus:ring-teal-500 focus:border-teal-500 transition-all">
                        @error('newEmail') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">Password</label>
                        <input wire:model="newUserPassword" type="password" placeholder="Minimal 8 karakter" class="w-full px-5 py-4 bg-slate-950 border-white/5 rounded-2xl text-sm font-bold text-white focus:ring-teal-500 focus:border-teal-500 transition-all">
                        @error('newUserPassword') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">Peran Akses</label>
                        <div class="flex flex-wrap gap-2 p-3 bg-slate-950 rounded-2xl border border-white/5">
                            @foreach($availableRoles as $role)
                                <label class="flex items-center gap-2 px-3 py-2 rounded-xl cursor-pointer hover:bg-white/5 transition-all">
                                    <input type="checkbox" wire:model="newUserRoles" value="{{ $role->name }}" class="rounded bg-slate-800 border-white/10 text-teal-500 focus:ring-teal-500">
                                    <span class="text-[10px] font-black uppercase tracking-tight text-slate-400">{{ $role->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-teal-600 text-white rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-teal-700 shadow-xl shadow-teal-600/20 transition-all">
                            Buat Pengguna Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>


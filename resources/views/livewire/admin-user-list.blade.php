<div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-slate-50 min-h-screen">
    {{-- Header --}}
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-[10px] font-black tracking-widest uppercase mb-3 border border-indigo-100">
                <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                User Management System
            </div>
            <h1 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tighter uppercase">
                Pengguna & <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-600">Akses</span>
            </h1>
            <p class="text-slate-500 font-bold text-sm mt-1">Kelola hak akses, peran, dan identitas pengguna PinjolWatch secara terukur.</p>
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <div class="relative group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607z" />
                </svg>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari nama atau email..." class="w-full md:w-64 pl-12 pr-4 py-3 bg-white border-slate-200 rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 text-sm font-medium shadow-sm">
            </div>

            <select wire:model.live="role" class="py-3 px-4 bg-white border-slate-200 rounded-2xl text-sm font-medium shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Semua Peran</option>
                @foreach($availableRoles as $r)
                    <option value="{{ $r->name }}">{{ strtoupper($r->name) }}</option>
                @endforeach
            </select>

            <select wire:model.live="status" class="py-3 px-4 bg-white border-slate-200 rounded-2xl text-sm font-medium shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
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

    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            <button wire:click="sortBy('name')" class="flex items-center gap-1 hover:text-indigo-600 transition-colors">
                                Pengguna
                                @if($sortField === 'name')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}" />
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Peran</th>
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                            <button wire:click="sortBy('created_at')" class="flex items-center gap-1 mx-auto hover:text-indigo-600 transition-colors">
                                Bergabung
                                @if($sortField === 'created_at')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="{{ $sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}" />
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 font-black text-sm overflow-hidden border border-indigo-100/50 shadow-sm shrink-0">
                                        @if($user->avatar_url)
                                            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                        @else
                                            {{ substr($user->name, 0, 1) }}
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-sm font-black text-slate-900 leading-none mb-1">{{ $user->name }}</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-wrap justify-center gap-1">
                                    @foreach($user->roles as $role)
                                        <span class="px-2 py-0.5 rounded-lg text-[9px] font-black uppercase tracking-tighter {{ $role->name === 'super-admin' ? 'bg-rose-50 text-rose-600 border border-rose-100' : 'bg-indigo-50 text-indigo-600 border border-indigo-100' }}">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                @if($user->email_verified_at)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-black uppercase tracking-tighter border border-emerald-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Verified
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-black uppercase tracking-tighter border border-amber-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-center text-[10px] font-bold text-slate-500 uppercase tracking-widest">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button wire:click="openEditModal({{ $user->id }})" class="p-2 bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all" title="Edit User">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                    <button wire:click="openResetModal({{ $user->id }})" class="p-2 bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white rounded-lg transition-all" title="Reset Password">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                        </svg>
                                    </button>
                                    @if(!$user->email_verified_at)
                                        <button wire:click="verifyUser({{ $user->id }})" class="p-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded-lg transition-all" title="Verifikasi">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </button>
                                    @endif
                                    <button onclick="confirm('Hapus pengguna ini?') || event.stopImmediatePropagation()" wire:click="deleteUser({{ $user->id }})" class="p-2 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-lg transition-all" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.34 12.142m-4.204 0L9.412 9m9.965-3.682c.151-.033.302-.066.453-.098l.372-.083a.487.487 0 0 0 .33-.625.487.487 0 0 0-.625-.332l-.372.083a12.164 12.164 0 0 0-3.32 1.123M18.65 19.071A9.723 9.723 0 0 1 15 21a9.723 9.723 0 0 1-3.65-1.929M6.412 5.318A12.163 12.163 0 0 0 3.09 4.195a.487.487 0 0 0-.625.332.487.487 0 0 0 .33.625l.372.083c.151.033.302.066.453.098m10.724 13.738A9.723 9.723 0 0 1 11 21a9.723 9.723 0 0 1-3.738-1.724M15 9V5.25A2.25 2.25 0 0 0 12.75 3h-1.5A2.25 2.25 0 0 0 9 5.25V9m6 0H9" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center opacity-30">
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
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in">
        <div class="bg-white rounded-[2.5rem] w-full max-w-md overflow-hidden shadow-2xl border border-white/20">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-black text-slate-900 tracking-tighter uppercase italic">Edit Pengguna</h2>
                    <button wire:click="$set('isEditModalOpen', false)" class="text-slate-400 hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <form wire:submit.prevent="updateUser" class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                        <input wire:model="editingName" type="text" class="w-full px-5 py-4 bg-slate-50 border-slate-100 rounded-2xl text-sm font-bold focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        @error('editingName') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Alamat Email</label>
                        <input wire:model="editingEmail" type="email" class="w-full px-5 py-4 bg-slate-50 border-slate-100 rounded-2xl text-sm font-bold focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        @error('editingEmail') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Peran Akses</label>
                        <div class="flex flex-wrap gap-2 p-2 bg-slate-50 rounded-2xl border border-slate-100">
                            @foreach($availableRoles as $role)
                                <label class="flex items-center gap-2 px-3 py-2 rounded-xl cursor-pointer hover:bg-white transition-all">
                                    <input type="checkbox" wire:model="editingRoles" value="{{ $role->name }}" class="rounded text-indigo-600 focus:ring-indigo-500">
                                    <span class="text-[10px] font-black uppercase tracking-tight text-slate-600">{{ $role->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-indigo-600 text-white rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-indigo-700 shadow-lg shadow-indigo-600/30 transition-all">
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
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in">
        <div class="bg-white rounded-[2.5rem] w-full max-w-sm overflow-hidden shadow-2xl border border-white/20">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-black text-slate-900 tracking-tighter uppercase italic">Reset Password</h2>
                    <button wire:click="$set('isResetModalOpen', false)" class="text-slate-400 hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="mb-6 p-4 bg-amber-50 rounded-2xl border border-amber-100">
                    <p class="text-[10px] font-bold text-amber-700 uppercase tracking-tight leading-relaxed">
                        Tindakan ini akan mengganti password pengguna secara paksa. Berikan password baru kepada pengguna setelah berhasil.
                    </p>
                </div>

                <form wire:submit.prevent="saveNewPassword" class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Password Baru</label>
                        <input wire:model="newPassword" type="password" placeholder="Minimal 8 karakter" class="w-full px-5 py-4 bg-slate-50 border-slate-100 rounded-2xl text-sm font-bold focus:ring-amber-500 focus:border-amber-500 transition-all">
                        @error('newPassword') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-amber-600 text-white rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-amber-700 shadow-lg shadow-amber-600/30 transition-all">
                            Konfirmasi Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>


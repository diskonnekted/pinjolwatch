<div class="py-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 bg-slate-50 min-h-screen">
    {{-- Header --}}
    <div class="mb-10">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-200 text-slate-700 text-[10px] font-black tracking-widest uppercase mb-3 border border-slate-300">
            System Preferences
        </div>
        <h1 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tighter uppercase">
            Pengaturan <span class="text-transparent bg-clip-text bg-gradient-to-r from-slate-600 to-slate-900">Sistem</span>
        </h1>
        <p class="text-slate-500 font-bold text-sm mt-1">Konfigurasi parameter global dan mode operasional aplikasi.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl shadow-sm flex items-center gap-2 animate-in fade-in slide-in-from-top-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
            <span class="text-sm font-bold">{{ session('message') }}</span>
        </div>
    @endif

    <div class="space-y-8">
        {{-- General Section --}}
        <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50 border border-slate-100">
            <h2 class="text-lg font-black text-slate-900 uppercase tracking-tighter mb-8 pb-4 border-b border-slate-50">General Configuration</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Nama Aplikasi</label>
                    <input wire:model="site_name" type="text" class="w-full px-4 py-3 bg-slate-50 border-slate-200 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Max Upload (KB)</label>
                    <input wire:model="max_file_size" type="number" class="w-full px-4 py-3 bg-slate-50 border-slate-200 rounded-xl focus:ring-primary-500 focus:border-primary-500 text-sm font-bold">
                </div>
            </div>

            <div class="mt-10 space-y-6">
                <div class="flex items-center justify-between p-6 bg-slate-50 rounded-2xl border border-slate-100">
                    <div>
                        <p class="text-sm font-black text-slate-900 uppercase tracking-tight">Maintenance Mode</p>
                        <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Matikan akses publik sementara</p>
                    </div>
                    <button wire:click="$toggle('maintenance_mode')" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none {{ $maintenance_mode ? 'bg-primary-600' : 'bg-slate-200' }}">
                        <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $maintenance_mode ? 'translate-x-5' : 'translate-x-0' }}"></span>
                    </button>
                </div>

                <div class="flex items-center justify-between p-6 bg-slate-50 rounded-2xl border border-slate-100">
                    <div>
                        <p class="text-sm font-black text-slate-900 uppercase tracking-tight">User Registration</p>
                        <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Izinkan pendaftaran akun baru</p>
                    </div>
                    <button wire:click="$toggle('registration_enabled')" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none {{ $registration_enabled ? 'bg-primary-600' : 'bg-slate-200' }}">
                        <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $registration_enabled ? 'translate-x-5' : 'translate-x-0' }}"></span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Footer Actions --}}
        <div class="flex justify-end gap-4">
            <button class="px-8 py-4 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-2xl font-black text-[10px] uppercase tracking-widest transition-all">Reset Default</button>
            <button wire:click="save" class="px-8 py-4 bg-primary-600 hover:bg-primary-500 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest transition-all shadow-lg shadow-primary-500/30">Simpan Perubahan</button>
        </div>
    </div>
</div>

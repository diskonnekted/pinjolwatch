<div class="max-w-4xl mx-auto py-12 px-6">
    @if($submitted)
        <div class="glass p-12 text-center animate-in fade-in zoom-in duration-500 rounded-[3rem] border-teal-500/20">
            <div class="w-24 h-24 bg-teal-500/10 rounded-full flex items-center justify-center text-5xl mx-auto mb-8 shadow-lg shadow-teal-500/10 border border-teal-500/20">
                ✨
            </div>
            <h2 class="text-4xl font-black text-white italic uppercase tracking-tighter mb-4 grad">Terima Kasih, Calon Pejuang!</h2>
            <p class="text-slate-400 text-lg leading-relaxed max-w-xl mx-auto mb-10">
                Aplikasi Anda telah kami terima. Tim inti PinjolWatch akan meninjau profil Anda dan menghubungi Anda melalui WhatsApp dalam waktu 3-5 hari kerja.
            </p>
            <a href="/" class="px-10 py-4 bg-slate-800 text-white font-black text-xs rounded-2xl uppercase tracking-widest hover:bg-slate-700 transition-all">
                Kembali ke Beranda
            </a>
        </div>
    @else
        <div class="mb-12 text-center">
            <div class="badge mb-4">Relawan PinjolWatch</div>
            <h2 class="text-5xl font-black text-white italic uppercase tracking-tighter mb-4 grad">Jadilah Bagian dari Solusi.</h2>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">
                Bantu kami memberdayakan pejuang pemulihan dan melawan praktik pinjol ilegal. Kami membutuhkan keterampilan, empati, dan dedikasi Anda.
            </p>
        </div>

        <form wire:submit.prevent="submit" class="glass p-8 md:p-12 rounded-[3rem] border-slate-800 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Nama Lengkap --}}
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-4">Nama Lengkap</label>
                    <input wire:model="full_name" type="text" class="w-full bg-slate-950 border-slate-800 rounded-2xl px-6 py-4 text-slate-200 focus:ring-teal-500 focus:border-teal-500 transition-all font-medium" placeholder="Masukkan nama sesuai identitas">
                    @error('full_name') <span class="text-rose-500 text-[10px] font-bold uppercase ml-4">{{ $message }}</span> @enderror
                </div>

                {{-- Email --}}
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-4">Email Aktif</label>
                    <input wire:model="email" type="email" class="w-full bg-slate-950 border-slate-800 rounded-2xl px-6 py-4 text-slate-200 focus:ring-teal-500 focus:border-teal-500 transition-all font-medium" placeholder="Alamat email Anda">
                    @error('email') <span class="text-rose-500 text-[10px] font-bold uppercase ml-4">{{ $message }}</span> @enderror
                </div>

                {{-- WhatsApp --}}
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-4">Nomor WhatsApp</label>
                    <input wire:model="whatsapp" type="text" class="w-full bg-slate-950 border-slate-800 rounded-2xl px-6 py-4 text-slate-200 focus:ring-teal-500 focus:border-teal-500 transition-all font-medium" placeholder="Contoh: 0812xxxxxxxx">
                    @error('whatsapp') <span class="text-rose-500 text-[10px] font-bold uppercase ml-4">{{ $message }}</span> @enderror
                </div>

                {{-- Role Interest --}}
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-4">Minat Peran</label>
                    <select wire:model="role_interest" class="w-full bg-slate-950 border-slate-800 rounded-2xl px-6 py-4 text-slate-200 focus:ring-teal-500 focus:border-teal-500 transition-all font-medium appearance-none">
                        <option value="">Pilih Peran Anda</option>
                        <option value="moderator">Moderator Komunitas & Konten</option>
                        <option value="advocate">Pendamping Hukum/Advokasi</option>
                        <option value="counselor">Konselor Sebaya (Peer Support)</option>
                        <option value="tech">Tech Support / Pengelola Website</option>
                        <option value="designer">Desainer Grafis / Konten Kreator</option>
                    </select>
                    @error('role_interest') <span class="text-rose-500 text-[10px] font-bold uppercase ml-4">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Skills --}}
            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-4">Keahlian Utama</label>
                <textarea wire:model="skills" rows="3" class="w-full bg-slate-950 border-slate-800 rounded-3xl px-6 py-4 text-slate-200 focus:ring-teal-500 focus:border-teal-500 transition-all font-medium" placeholder="Sebutkan keahlian atau pengalaman yang relevan dengan peran yang Anda pilih..."></textarea>
                @error('skills') <span class="text-rose-500 text-[10px] font-bold uppercase ml-4">{{ $message }}</span> @enderror
            </div>

            {{-- Motivation --}}
            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-4">Motivasi Bergabung</label>
                <textarea wire:model="motivation" rows="3" class="w-full bg-slate-950 border-slate-800 rounded-3xl px-6 py-4 text-slate-200 focus:ring-teal-500 focus:border-teal-500 transition-all font-medium" placeholder="Apa yang mendorong Anda ingin membantu penyintas pinjol?"></textarea>
                @error('motivation') <span class="text-rose-500 text-[10px] font-bold uppercase ml-4">{{ $message }}</span> @enderror
            </div>

            {{-- Commitment --}}
            <div class="space-y-2">
                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-4">Komitmen Waktu</label>
                <select wire:model="commitment_hours" class="w-full bg-slate-950 border-slate-800 rounded-2xl px-6 py-4 text-slate-200 focus:ring-teal-500 focus:border-teal-500 transition-all font-medium appearance-none">
                    <option value="">Pilih Estimasi Komitmen</option>
                    <option value="1-5">1 - 5 Jam per Minggu</option>
                    <option value="5-10">5 - 10 Jam per Minggu</option>
                    <option value="10+">Lebih dari 10 Jam per Minggu</option>
                    <option value="flexible">Fleksibel (Berdasarkan Kebutuhan Kasus)</option>
                </select>
                @error('commitment_hours') <span class="text-rose-500 text-[10px] font-bold uppercase ml-4">{{ $message }}</span> @enderror
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full py-5 bg-teal-600 hover:bg-teal-500 text-white font-black text-sm rounded-3xl uppercase tracking-widest transition-all shadow-lg shadow-teal-900/20 active:scale-[0.98]">
                    KIRIM APLIKASI RELAWAN
                </button>
                <p class="text-center text-[10px] text-slate-600 font-bold uppercase tracking-[0.2em] mt-6">
                    Data Anda aman dan hanya akan digunakan untuk proses rekrutmen tim inti.
                </p>
            </div>
        </form>
    @endif
</div>

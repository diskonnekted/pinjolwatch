<x-mobile-layout>
    <div class="mobile-container pb-28 text-slate-100 min-h-screen flex flex-col justify-center px-6">
        {{-- Ambient Orbs --}}
        <div class="absolute top-[-10%] left-[-10%] w-[300px] h-[300px] rounded-full bg-teal-600/10 blur-[100px] pointer-events-none"></div>
        
        <div class="relative z-10">
            <div class="text-center mb-10">
                <a href="/">
                    <img src="/pw-logo.png" class="h-20 w-auto mx-auto mb-6 drop-shadow-[0_0_20px_rgba(20,184,166,0.3)]" alt="PinjolWatch">
                </a>
                <h2 class="text-2xl font-black text-white tracking-tight">Selamat Datang</h2>
                <p class="text-slate-400 text-sm mt-2">Masuk untuk mengelola laporan Anda</p>
            </div>

            <div class="glass-panel rounded-[32px] p-8 shadow-2xl border-white/10">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-2 px-1" />
                        <x-text-input id="email" class="block w-full bg-slate-900/50 border-white/10 text-white rounded-2xl py-4" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-2 px-1" />
                        <x-text-input id="password" class="block w-full bg-slate-900/50 border-white/10 text-white rounded-2xl py-4"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Fully Vertical Captcha --}}
                    <div class="p-8 bg-slate-900/80 rounded-[32px] border border-white/5 flex flex-col items-center">
                        <x-input-label for="captcha" :value="__('Verifikasi Keamanan')" class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] mb-8 text-center" />
                        
                        <div class="flex flex-col items-center gap-6">
                            {{-- Math Problem --}}
                            <div class="flex flex-col items-end text-5xl font-black text-teal-400 tracking-tighter">
                                <div class="flex items-center gap-4">
                                    <span class="text-xl text-slate-500 font-bold">+</span>
                                    <span>{{ $num1 }}</span>
                                </div>
                                <div class="flex items-center gap-4 border-b-4 border-slate-700 pb-2 mt-1 w-full justify-end">
                                    <span class="text-xl text-slate-500 font-bold">=</span>
                                    <span>{{ $num2 }}</span>
                                </div>
                            </div>

                            {{-- Input Field Below --}}
                            <div class="w-full max-w-[160px] mt-2">
                                <x-text-input id="captcha" class="block w-full bg-slate-800 border-teal-500/30 text-white text-center font-black text-4xl rounded-[24px] py-6 shadow-[0_0_30px_rgba(20,184,166,0.15)] focus:border-teal-500 focus:ring-teal-500/20" 
                                              type="text" name="captcha" required placeholder="?" />
                            </div>
                        </div>

                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-[0.1em] mt-8">Berapakah hasil penjumlahan di atas?</p>
                    </div>

                    <div class="flex items-center justify-between px-1">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded-md border-white/10 bg-slate-900 text-teal-500 focus:ring-teal-500" name="remember">
                            <span class="ms-2 text-xs font-bold text-slate-400 uppercase tracking-widest">{{ __('Ingat Saya') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-xs font-bold text-teal-400 uppercase tracking-widest" href="{{ route('password.request') }}">
                                {{ __('Lupa?') }}
                            </a>
                        @endif
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex items-center justify-center py-4 rounded-2xl font-black text-white shadow-xl shadow-teal-900/20 active:scale-95 transition-all uppercase tracking-widest" style="background: linear-gradient(135deg, #0d9488 0%, #0891b2 100%);">
                            {{ __('Masuk') }}
                        </button>
                    </div>

                    <div class="text-center mt-6">
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">
                            Belum Punya Akun? 
                            <a href="{{ route('register') }}" class="text-teal-400 ml-1">Daftar Sekarang</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-mobile-layout>

<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-900 px-4">
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-slate-900 shadow-[0_4px_20px_rgba(0,0,0,0.3)] overflow-hidden sm:rounded-2xl border border-slate-800">
            <div class="mb-8 text-center">
                <a href="/">
                    <div class="inline-flex items-center justify-center mb-4">
                        <img src="/pw-logo.png" class="h-20 w-auto" alt="PinjolWatch Logo">
                    </div>
                </a>
                <h2 class="text-2xl font-bold text-slate-100 tracking-tight">Selamat Datang Kembali</h2>
                <p class="mt-2 text-sm text-slate-400 font-medium">Masuk ke akun PinjolWatch Anda</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-slate-300 font-semibold mb-1" />
                    <x-text-input id="email" class="block w-full bg-slate-800 border-slate-700 text-slate-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-slate-300 font-semibold mb-1" />
                    <x-text-input id="password" class="block w-full bg-slate-800 border-slate-700 text-slate-200"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded border-slate-700 bg-slate-800 text-primary-500 shadow-sm focus:ring-primary-500 transition duration-150" name="remember">
                        <span class="ms-2 text-sm text-slate-400 group-hover:text-slate-200 transition duration-150">{{ __('Ingat saya') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-semibold text-primary-400 hover:text-primary-300 transition duration-150" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>

                <div class="pt-2">
                    <x-primary-button class="w-full justify-center py-3 text-sm font-bold tracking-wide">
                        {{ __('Masuk Sekarang') }}
                    </x-primary-button>
                </div>

                <div class="text-center text-sm text-slate-400 mt-6">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-bold text-primary-400 hover:text-primary-300 transition duration-150 underline decoration-primary-800/50 underline-offset-4">
                        Daftar Gratis
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

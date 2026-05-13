<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-900 px-4 py-12">
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-slate-900 shadow-[0_4px_20px_rgba(0,0,0,0.3)] overflow-hidden sm:rounded-2xl border border-slate-800">
            <div class="mb-8 text-center">
                <a href="/">
                    <div class="inline-flex items-center justify-center mb-4">
                        <img src="/pw-logo.webp" class="h-20 w-auto" alt="PinjolWatch Logo">
                    </div>
                </a>
                <h2 class="text-2xl font-bold text-slate-100 tracking-tight">Buat Akun Baru</h2>
                <p class="mt-2 text-sm text-slate-400 font-medium">Bergabunglah dengan komunitas PinjolWatch</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="text-slate-300 font-semibold mb-1" />
                    <x-text-input id="name" class="block w-full bg-slate-800 border-slate-700 text-slate-200" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama Anda" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-slate-300 font-semibold mb-1" />
                    <x-text-input id="email" class="block w-full bg-slate-800 border-slate-700 text-slate-200" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-slate-300 font-semibold mb-1" />
                    <x-text-input id="password" class="block w-full bg-slate-800 border-slate-700 text-slate-200"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" placeholder="Minimal 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-slate-300 font-semibold mb-1" />
                    <x-text-input id="password_confirmation" class="block w-full bg-slate-800 border-slate-700 text-slate-200"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="pt-2">
                    <x-primary-button class="w-full justify-center py-3 text-sm font-bold tracking-wide">
                        {{ __('Daftar Sekarang') }}
                    </x-primary-button>
                </div>

                <div class="text-center text-sm text-slate-400 mt-6">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="font-bold text-primary-400 hover:text-primary-300 transition duration-150 underline decoration-primary-800/50 underline-offset-4">
                        Masuk di sini
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

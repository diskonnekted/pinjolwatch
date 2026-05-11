<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50 px-4">
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-100">
            <div class="mb-8 text-center">
                <a href="/">
                    <div class="inline-flex items-center justify-center mb-4">
                        <img src="/pw-logo.png" class="h-20 w-auto" alt="PinjolWatch Logo">
                    </div>
                </a>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Lupa Password?</h2>
                <p class="mt-2 text-sm text-gray-600 font-medium">Jangan khawatir, kami akan membantu Anda mengatur ulang.</p>
            </div>

            <div class="mb-6 text-sm text-gray-600 leading-relaxed text-center">
                {{ __('Beri tahu kami alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold mb-1" />
                    <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="nama@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-primary-button class="w-full justify-center py-3 text-sm font-bold tracking-wide">
                        {{ __('Kirim Tautan Pengaturan Ulang') }}
                    </x-primary-button>
                </div>

                <div class="text-center text-sm text-gray-600 mt-6">
                    Teringat kembali? 
                    <a href="{{ route('login') }}" class="font-bold text-primary-600 hover:text-primary-500 transition duration-150">
                        Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

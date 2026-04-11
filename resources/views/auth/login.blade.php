<x-guest-layout>
    <div class="mb-10 text-center">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-primary-600 text-white shadow-xl shadow-primary-200 mb-6">
            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Selamat Kembali</h1>
        <p class="mt-2 text-sm text-slate-400 font-medium">Log masuk untuk mengurus kariah masjid anda.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('E-mel')" class="text-xs font-bold uppercase tracking-widest text-slate-500" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="alamat@emel.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Kata Laluan')" class="text-xs font-bold uppercase tracking-widest text-slate-500" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-primary-600 hover:text-primary-700 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Lupa?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-lg border-slate-200 text-primary-600 shadow-sm focus:ring-primary-500" name="remember">
                <span class="ms-2 text-sm font-medium text-slate-500">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-4 text-base shadow-xl shadow-primary-200">
                {{ __('Masuk Sekarang') }}
            </x-primary-button>
        </div>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 transition-colors hover:bg-slate-50">
                Daftar Akaun
            </a>
            <a href="{{ route('auth.google.redirect') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 transition-colors hover:bg-slate-50">
                Daftar / Login Google
            </a>
        </div>
    </form>
</x-guest-layout>

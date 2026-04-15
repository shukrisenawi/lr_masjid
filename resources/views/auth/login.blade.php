<x-guest-layout>
    <div class="mb-10">
        <div class="inline-flex h-16 w-16 items-center justify-center rounded-[1.5rem] bg-gradient-to-br from-primary-500 to-primary-700 text-white shadow-[0_22px_45px_-22px_rgba(22,127,75,0.85)]">
            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>
        <p class="mt-6 text-[0.72rem] font-bold uppercase tracking-[0.28em] text-primary-700">Akses Pentadbir</p>
        <h1 class="mt-3 text-4xl font-black tracking-[-0.04em] text-slate-900">Selamat kembali</h1>
        <p class="mt-3 max-w-md text-sm leading-7 text-slate-500">Log masuk untuk menyemak ahli kariah, hebahan, kutipan dan dokumen rasmi masjid.</p>
    </div>

    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <x-input-label for="email" :value="__('E-mel')" class="text-xs font-bold uppercase tracking-[0.24em] text-slate-500" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="alamat@emel.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Kata Laluan')" class="text-xs font-bold uppercase tracking-[0.24em] text-slate-500" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-primary-700 transition-colors hover:text-primary-800" href="{{ route('password.request') }}">
                        {{ __('Lupa?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between rounded-2xl bg-slate-50/80 px-4 py-3">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-lg border-slate-300 text-primary-600 shadow-sm focus:ring-primary-500" name="remember">
                <span class="ms-2 text-sm font-medium text-slate-600">{{ __('Ingat saya') }}</span>
            </label>
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">Sesi selamat</span>
        </div>

        <div class="space-y-3 pt-2">
            <x-primary-button class="w-full justify-center py-4 text-base shadow-[0_22px_45px_-22px_rgba(22,127,75,0.85)]">
                {{ __('Masuk Sekarang') }}
            </x-primary-button>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 transition-colors hover:border-primary-200 hover:bg-primary-50/50 hover:text-primary-700">
                    Daftar Akaun
                </a>
                <a href="{{ route('auth.google.redirect') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 transition-colors hover:border-primary-200 hover:bg-primary-50/50 hover:text-primary-700">
                    Daftar / Login Google
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>

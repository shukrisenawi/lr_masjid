<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&family=outfit:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900" x-data="{ sidebarOpen: false }">
        <div class="relative flex min-h-screen overflow-hidden">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(36,159,97,0.16),_transparent_32%),radial-gradient(circle_at_bottom_right,_rgba(176,143,86,0.18),_transparent_22%)]"></div>

            @include('layouts.navigation')

            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                <header class="sticky top-0 z-30 px-4 pt-4 sm:px-6 lg:px-8 lg:pt-6">
                    <div class="glass flex min-h-[5.5rem] items-center rounded-[1.75rem] px-4 py-3 shadow-[0_16px_50px_-38px_rgba(15,23,42,0.65)] sm:px-6">
                        <div class="flex w-full items-center justify-between gap-4">
                            <div class="flex items-center gap-3 sm:gap-4">
                                <button @click="sidebarOpen = true" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200/80 bg-white/80 text-slate-600 transition hover:border-primary-200 hover:text-primary-700 lg:hidden">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                                <div>
                                    <p class="ui-label">Pusat Pentadbiran</p>
                                    <h1 class="text-lg font-extrabold tracking-[-0.03em] text-slate-900 sm:text-xl">
                                        {{ request()->segment(1) ? str(request()->segment(1))->replace('-', ' ')->title() : 'Dashboard' }}
                                    </h1>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="relative hidden xl:block">
                                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                                        </svg>
                                    </span>
                                    <input type="text" placeholder="Cari modul, rekod atau tindakan..." class="w-80 rounded-2xl border border-slate-200/80 bg-white/80 py-3 pl-11 pr-4 text-sm font-medium text-slate-700 placeholder:text-slate-400 focus:border-primary-300 focus:ring-2 focus:ring-primary-200">
                                </div>

                                <div class="hidden rounded-2xl border border-amber-200/70 bg-amber-50/80 px-4 py-2.5 text-right sm:block">
                                    <p class="text-[0.7rem] font-bold uppercase tracking-[0.22em] text-amber-700">Status Hari Ini</p>
                                    <p class="text-sm font-semibold text-amber-900">{{ now()->translatedFormat('l, d M Y') }}</p>
                                </div>

                                <div class="flex items-center gap-3 rounded-2xl border border-white/70 bg-white/85 px-3 py-2 shadow-sm">
                                    <div class="hidden text-right sm:block">
                                        <p class="text-sm font-bold text-slate-900 capitalize">{{ Auth::user()->name }}</p>
                                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">{{ Auth::user()->role?->name ?? 'Pentadbir' }}</p>
                                    </div>
                                    <div class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 text-sm font-extrabold text-white">
                                        @if (Auth::user()->avatar_path)
                                            <img src="{{ asset('storage/'.Auth::user()->avatar_path) }}" alt="Avatar pengguna" class="h-full w-full object-cover">
                                        @else
                                            <span>{{ str(Auth::user()->name)->substr(0, 1)->upper() }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="px-4 pt-6 sm:px-6 lg:px-8">
                    @isset($header)
                        <section class="ui-surface px-5 py-6 sm:px-6 lg:px-8">
                            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                                <div class="space-y-2">
                                    {{ $header }}
                                </div>
                                <nav class="flex flex-wrap items-center gap-2 text-xs font-bold uppercase tracking-[0.22em] text-slate-400" aria-label="Breadcrumb">
                                    <a href="{{ route('dashboard') }}" class="transition hover:text-primary-700">{{ config('app.name') }}</a>
                                    <span>/</span>
                                    <span class="text-slate-500">{{ request()->segment(1) ? str(request()->segment(1))->replace('-', ' ')->title() : 'Dashboard' }}</span>
                                </nav>
                            </div>
                        </section>
                    @endisset

                    <main class="pb-10 pt-6 sm:pb-12 lg:pb-14">
                        <div class="ui-redesign ui-page-content mx-auto max-w-7xl">
                            @if (session('success'))
                                <div class="rounded-[1.5rem] border border-emerald-200 bg-emerald-50/90 p-4 text-emerald-900 shadow-sm">
                                    <div class="flex items-center gap-3">
                                        <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="font-medium">{{ session('success') }}</span>
                                    </div>
                                </div>
                            @endif

                            @if (session('warning'))
                                <div class="rounded-[1.5rem] border border-amber-200 bg-amber-50/90 p-4 text-amber-900 shadow-sm">
                                    <div class="flex items-center gap-3">
                                        <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86l-8.18 14.17A1 1 0 003 19.5h18a1 1 0 00.87-1.47L13.7 3.86a1 1 0 00-1.74 0z" />
                                        </svg>
                                        <span class="font-medium">{{ session('warning') }}</span>
                                    </div>
                                </div>
                            @endif

                            {{ $slot }}
                        </div>
                    </main>
                </div>

                <footer class="px-4 pb-8 text-center text-sm text-slate-500 sm:px-6 lg:px-8">
                    {{ config('app.name') }} · Sistem pengurusan kariah yang lebih teratur dan mudah dipantau.
                </footer>
            </div>
        </div>
    </body>
</html>

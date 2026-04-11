<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900" x-data="{ sidebarOpen: false }">
        <div class="flex h-screen overflow-hidden bg-white">
            <!-- Sidebar Navigation -->
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden bg-transparent">
                <!-- Top Navbar -->
                <header class="sticky top-0 z-30 flex h-24 w-full items-center border-b border-slate-200/70 bg-white/85 px-5 backdrop-blur-md sm:px-7 lg:px-10">
                    <div class="flex w-full items-center justify-between">
                        <!-- Left: Mobile Toggle & Search -->
                        <div class="flex items-center gap-5">
                            <button @click="sidebarOpen = true" class="rounded-xl p-2.5 text-slate-500 hover:bg-slate-100 lg:hidden">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                            <div class="relative hidden sm:block">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                                <input type="text" placeholder="Carian pantas..." class="w-72 rounded-2xl border border-slate-200 bg-slate-50 py-3 pl-10 pr-4 text-base font-medium focus:border-primary-300 focus:ring-2 focus:ring-primary-500/20 transition-all">
                            </div>
                        </div>

                        <!-- Right: Icons & User -->
                        <div class="flex items-center gap-3 sm:gap-5">
                            <button class="hidden rounded-xl p-2.5 text-slate-400 hover:bg-slate-50 hover:text-primary-600 sm:block">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                            <div class="h-8 w-[1px] bg-slate-100 mx-2 hidden sm:block"></div>
                            <div class="flex items-center gap-3 pl-2">
                                <div class="text-right hidden sm:block">
                                    <p class="text-sm font-black text-slate-900 leading-none capitalize">{{ Auth::user()->name }}</p>
                                    <p class="mt-1 text-sm font-semibold text-slate-500 uppercase tracking-wide">{{ Auth::user()->role?->name ?? 'Admin head' }}</p>
                                </div>
                                <div class="h-11 w-11 rounded-2xl bg-slate-100 flex items-center justify-center border-2 border-white shadow-sm overflow-hidden">
                                    @if (Auth::user()->avatar_path)
                                        <img src="{{ asset('storage/'.Auth::user()->avatar_path) }}" alt="Avatar pengguna" class="h-full w-full object-cover">
                                    @else
                                        <span class="text-sm font-black text-slate-400 uppercase">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Header with Breadcrumbs -->
                @isset($header)
                    <div class="px-5 pt-9 sm:px-7 lg:px-10">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between px-1">
                            {{ $header }}
                            <nav class="flex text-sm font-semibold uppercase tracking-wide text-slate-500" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                    <li class="inline-flex items-center">
                                        <a href="#" class="hover:text-primary-600 transition-colors capitalize">{{ config('app.name') }}</a>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1 md:ml-2 capitalize">{{ request()->segment(1) ?? 'Dashboard' }}</span>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 px-5 pb-10 pt-6 sm:px-7 sm:pb-12 lg:px-10 lg:pb-14">
                    <div class="ui-redesign ui-page-content mx-auto max-w-7xl">
                        @if (session('success'))
                            <div class="mb-6 rounded-2xl border border-emerald-100 bg-emerald-50/70 p-4 text-base text-emerald-800 backdrop-blur-sm animate-in fade-in slide-in-from-top-4">
                                <div class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="mb-6 rounded-2xl border border-amber-100 bg-amber-50/70 p-4 text-base text-amber-800 backdrop-blur-sm">
                                {{ session('warning') }}
                            </div>
                        @endif
                        {{ $slot }}
                    </div>
                </main>

                <footer class="px-4 py-7 text-center text-sm text-slate-500">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. Pengurusan Kariah Efisien.
                </footer>
            </div>
        </div>
    </body>
</html>

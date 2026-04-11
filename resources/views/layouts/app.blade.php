<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#f8fafc] text-slate-900" x-data="{ sidebarOpen: false }">
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar Navigation -->
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                <!-- Mobile Header -->
                <header class="sticky top-0 z-30 flex w-full border-b border-white/20 bg-white/70 backdrop-blur-md lg:hidden">
                    <div class="flex h-16 w-full items-center justify-between px-4">
                        <button @click="sidebarOpen = true" class="rounded-lg p-2 text-slate-600 hover:bg-slate-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div class="font-semibold text-primary-900">Sistem Masjid</div>
                        <div class="w-8"></div>
                    </div>
                </header>

                <!-- Page Heading -->
                @isset($header)
                    <header class="relative z-10 px-4 pt-8 sm:px-6 lg:px-8">
                        <div class="max-w-7xl mx-auto">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 p-4 pt-4 sm:p-6 lg:p-8">
                    <div class="max-w-7xl mx-auto">
                        @if (session('success'))
                            <div class="mb-6 rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 text-sm text-emerald-800 backdrop-blur-sm animate-in fade-in slide-in-from-top-4">
                                <div class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        {{ $slot }}
                    </div>
                </main>

                <footer class="py-6 px-4 text-center text-xs text-slate-400">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. Pengurusan Kariah Efisien.
                </footer>
            </div>
        </div>
    </body>
</html>

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
    <body class="font-sans text-slate-900 antialiased">
        <div class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10 sm:px-6 lg:px-8">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(36,159,97,0.14),_transparent_24%),radial-gradient(circle_at_bottom_right,_rgba(176,143,86,0.16),_transparent_22%)]"></div>

            <div class="relative grid w-full max-w-6xl overflow-hidden rounded-[2rem] border border-white/70 bg-white/90 shadow-[0_30px_100px_-45px_rgba(15,23,42,0.55)] lg:grid-cols-[1fr_0.9fr]">
                <div class="hidden bg-slate-900 p-10 text-white lg:flex lg:flex-col lg:justify-between">
                    <div>
                        <p class="text-[0.72rem] font-bold uppercase tracking-[0.3em] text-primary-200/80">Pentadbiran Digital</p>
                        <h1 class="mt-5 max-w-md text-5xl font-black tracking-[-0.05em]">Urus kariah dengan paparan yang tenang dan teratur.</h1>
                        <p class="mt-6 max-w-md text-base leading-8 text-slate-300">
                            Satu ruang kerja untuk ahli jawatankuasa, dokumen rasmi, hebahan komuniti dan rekod penting masjid.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5">
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-primary-200/80">Tersusun</p>
                            <p class="mt-2 text-lg font-bold">Paparan baru yang lebih kemas untuk semakan harian.</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5">
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-primary-200/80">Selamat</p>
                            <p class="mt-2 text-lg font-bold">Akses pentadbir, profil, dan modul penting dalam satu sistem.</p>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-8 sm:px-10 sm:py-10 lg:px-12 lg:py-12">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

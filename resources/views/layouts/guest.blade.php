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
    <body class="font-sans text-slate-900 antialiased">
        <div class="flex min-h-screen flex-col items-center pt-8 sm:justify-center sm:pt-0">
            <div class="w-full overflow-hidden border border-slate-200/80 bg-white/95 px-10 py-12 shadow-2xl shadow-slate-200/50 sm:mt-6 sm:max-w-lg sm:rounded-[2rem]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

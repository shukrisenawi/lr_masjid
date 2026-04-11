<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">Assalamualaikum, {{ Auth::user()->name }}</h2>
                <p class="text-slate-500">Selamat datang ke portal pengurusan kariah masjid anda.</p>
            </div>
            <div class="hidden sm:block text-right">
                <p class="text-sm font-bold text-primary-800">{{ now()->format('l') }}</p>
                <p class="text-xs text-slate-500">{{ now()->format('d F Y') }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-2 space-y-10">
        <!-- Hero Banner Section -->
        <div class="relative overflow-hidden rounded-[2rem] bg-primary-900 shadow-2xl">
            <div class="absolute inset-0 opacity-40 mix-blend-overlay">
                <!-- Gunakan imej yang dijana sebagai latar belakang banner -->
                <img src="/modern_mosque_banner_1775924354657.png" class="h-full w-full object-cover" alt="Banner Masjid">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-primary-950 via-primary-900/80 to-transparent"></div>
            <div class="relative z-10 flex flex-col justify-center p-8 md:p-12 md:w-2/3">
                <span class="inline-flex items-center rounded-full bg-emerald-500/20 px-3 py-1 text-xs font-bold text-emerald-300 backdrop-blur-md">Portal Rasmi Masjid</span>
                <h1 class="mt-4 text-3xl font-extrabold text-white md:text-5xl tracking-tight leading-tight">Membangun Ummah, Menghidupkan Sunnah.</h1>
                <p class="mt-4 text-emerald-100/80 text-lg max-w-md">Kini lebih mudah menguruskan kebajikan dan rekod anak kariah secara digital dan efisien.</p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('announcements.create') }}" class="rounded-xl bg-white px-6 py-3 text-sm font-bold text-primary-900 shadow-lg hover:bg-emerald-50 transition-all">Buat Hebahan Baru</a>
                    <a href="{{ route('members.index') }}" class="rounded-xl bg-primary-800/50 border border-white/20 px-6 py-3 text-sm font-bold text-white backdrop-blur-md hover:bg-primary-800/70 transition-all">Senarai Kariah</a>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="grid gap-10 lg:grid-cols-3">
            <!-- Left Side: Stats and Quick Actions -->
            <div class="lg:col-span-2 space-y-10">
                <!-- Stats Grid -->
                <div class="grid gap-6 sm:grid-cols-2">
                    @php
                        $statsConfig = [
                            ['label' => 'Anak Kariah', 'value' => $stats['members'], 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'emerald', 'desc' => 'Penduduk berdaftar'],
                            ['label' => 'AJK Masjid', 'value' => $stats['committeeMembers'], 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857', 'color' => 'blue', 'desc' => 'Barisan kepimpinan'],
                            ['label' => 'Kutipan RM', 'value' => number_format($stats['payments'], 2), 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4', 'color' => 'primary', 'desc' => 'Jumlah keseluruhan'],
                            ['label' => 'Peti Dokumen', 'value' => $stats['documents'], 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2', 'color' => 'amber', 'desc' => 'Arkib digital'],
                        ];
                    @endphp

                    @foreach($statsConfig as $stat)
                        <div class="card-zoom group relative overflow-hidden rounded-[2rem] bg-white p-6 shadow-sm border border-slate-100">
                            <div class="flex items-center gap-5">
                                <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-{{ $stat['color'] === 'primary' ? 'primary-50' : $stat['color'].'-50' }} text-{{ $stat['color'] === 'primary' ? 'primary-600' : $stat['color'].'-600' }} shadow-inner">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-slate-400 uppercase tracking-tight">{{ $stat['label'] }}</p>
                                    <p class="text-3xl font-black text-slate-900 tracking-tight">{{ $stat['value'] }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium mt-1">{{ $stat['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Quick Actions Navigation -->
                <div class="rounded-[2.5rem] bg-white p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 border-l-4 border-primary-600 pl-4">Akses Pantas</h3>
                    <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-6">
                         @php
                            $quickActions = [
                                ['label' => 'E-Khairat', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z', 'color' => 'bg-emerald-50 text-emerald-600'],
                                ['label' => 'Cetak Slip', 'icon' => 'M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z', 'color' => 'bg-blue-50 text-blue-600'],
                                ['label' => 'Peti Aduan', 'icon' => 'M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z', 'color' => 'bg-amber-50 text-amber-600'],
                                ['label' => 'Arkib PDF', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'bg-indigo-50 text-indigo-600'],
                            ];
                        @endphp
                        @foreach($quickActions as $action)
                            <a href="#" class="flex flex-col items-center justify-center p-6 rounded-3xl border border-slate-50 hover:bg-slate-50 transition-all card-zoom group text-center">
                                <div class="h-14 w-14 rounded-2xl {{ $action['color'] }} flex items-center justify-center shadow-lg shadow-current/10 mb-3 group-hover:scale-110 transition-transform">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $action['icon'] }}" />
                                    </svg>
                                </div>
                                <span class="text-xs font-bold text-slate-700 tracking-tight">{{ $action['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Side: Salah Times and Recent Activities -->
            <div class="space-y-10">
                <!-- Salah Times Widget -->
                <div class="rounded-[2.5rem] bg-primary-950 p-1 shadow-2xl relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-8 transform translate-x-12 -translate-y-12 rotate-12 opacity-10 group-hover:opacity-20 transition-opacity">
                         <svg class="h-40 w-40 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19,21V5a2,2,0,0,0-2-2H7A2,2,0,0,0,5,5V21h2V5H17V21h2Z" />
                        </svg>
                    </div>
                    <div class="p-8 relative z-10">
                        <h3 class="text-xl font-bold text-white mb-6">Waktu Solat</h3>
                        <div class="space-y-4">
                            @php
                                $salahTimes = [
                                    ['name' => 'Subuh', 'time' => '05:58', 'active' => false],
                                    ['name' => 'Syuruk', 'time' => '07:12', 'active' => false],
                                    ['name' => 'Zohor', 'time' => '13:14', 'active' => true],
                                    ['name' => 'Asar', 'time' => '16:25', 'active' => false],
                                    ['name' => 'Maghrib', 'time' => '19:16', 'active' => false],
                                    ['name' => 'Isyak', 'time' => '20:25', 'active' => false],
                                ];
                            @endphp
                            @foreach($salahTimes as $salah)
                                <div class="flex items-center justify-between p-3 rounded-2xl {{ $salah['active'] ? 'bg-primary-500/20 ring-1 ring-primary-400/50' : 'bg-white/5' }} transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="h-2 w-2 rounded-full {{ $salah['active'] ? 'bg-emerald-400 animate-pulse' : 'bg-white/20' }}"></div>
                                        <span class="text-sm font-bold {{ $salah['active'] ? 'text-emerald-300' : 'text-slate-300' }}">{{ $salah['name'] }}</span>
                                    </div>
                                    <span class="text-sm font-black {{ $salah['active'] ? 'text-white text-lg' : 'text-slate-400' }}">{{ $salah['time'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Recent Announcements (Mini) -->
                <div class="rounded-[2.5rem] bg-white p-1 shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-6 border-b border-slate-50 flex items-center justify-between">
                        <h3 class="font-bold text-slate-900">Hebahan</h3>
                        <a href="{{ route('announcements.index') }}" class="text-[10px] font-bold text-primary-600 uppercase tracking-widest">Semua</a>
                    </div>
                    <div class="p-5 space-y-5">
                        @forelse($recentAnnouncements as $item)
                            <div class="flex gap-4 group">
                                <div class="h-1 w-8 mt-2 rounded-full bg-primary-100 group-hover:bg-primary-600 transition-all shrink-0"></div>
                                <div>
                                    <p class="font-bold text-sm text-slate-800 leading-snug group-hover:text-primary-700 transition-colors">{{ $item->title }}</p>
                                    <p class="mt-1 text-[10px] text-slate-400 font-bold uppercase tracking-tight">{{ optional($item->published_at)->diffForHumans() ?? $item->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="py-10 text-center text-xs text-slate-400 italic">Tiada hebahan terkini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


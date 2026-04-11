<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">Selamat Datang, {{ Auth::user()->name }}</h2>
                <p class="text-slate-500">Ringkasan pengurusan kariah masjid anda hari ini.</p>
            </div>
            <div class="hidden sm:block">
                <span class="inline-flex items-center rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold text-primary-700">
                    {{ now()->format('d M Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-2">
        <!-- Stats Grid -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @php
                $statsConfig = [
                    ['label' => 'Anak Kariah', 'value' => $stats['members'], 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'emerald'],
                    ['label' => 'Ahli Jawatankuasa', 'value' => $stats['committeeMembers'], 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'color' => 'blue'],
                    ['label' => 'Hebahan Aktif', 'value' => $stats['announcements'], 'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z', 'color' => 'amber'],
                    ['label' => 'Peti Dokumen', 'value' => $stats['documents'], 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'indigo'],
                    ['label' => 'Rekod Kematian', 'value' => $stats['deathRecords'], 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'color' => 'rose'],
                    ['label' => 'Jumlah Kutipan (RM)', 'value' => number_format($stats['payments'], 2), 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z', 'color' => 'primary'],
                ];
            @endphp

            @foreach($statsConfig as $stat)
                <div class="group relative overflow-hidden rounded-3xl bg-white p-6 shadow-sm border border-slate-100 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/50">
                    <div class="flex items-center gap-4">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-{{ $stat['color'] === 'primary' ? 'primary-50' : $stat['color'].'-50' }} text-{{ $stat['color'] === 'primary' ? 'primary-600' : $stat['color'].'-600' }} transition-colors group-hover:bg-{{ $stat['color'] === 'primary' ? 'primary-100' : $stat['color'].'-100' }}">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500">{{ $stat['label'] }}</p>
                            <p class="text-2xl font-bold tracking-tight text-slate-900">{{ $stat['value'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Recent Activities Space -->
        <div class="mt-10 grid gap-8 lg:grid-cols-2">
            <!-- Announcements -->
            <div class="rounded-3xl bg-white p-1 shadow-sm border border-slate-100 overflow-hidden">
                <div class="flex items-center justify-between px-5 py-4 border-b border-slate-50">
                    <h3 class="font-bold text-slate-900">Hebahan Terkini</h3>
                    <a href="{{ route('announcements.index') }}" class="text-xs font-semibold text-primary-600 hover:text-primary-700">Lihat Semua</a>
                </div>
                <div class="p-4 space-y-4">
                    @forelse($recentAnnouncements as $item)
                        <div class="flex items-start gap-3 p-3 rounded-2xl transition-colors hover:bg-slate-50">
                            <div class="h-2 w-2 mt-2 rounded-full bg-primary-500"></div>
                            <div>
                                <p class="font-semibold text-sm text-slate-900 leading-snug">{{ $item->title }}</p>
                                <p class="mt-1 text-xs text-slate-400 capitalize">Diterbitkan pada {{ optional($item->published_at)->format('d/m/Y') ?? $item->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="py-10 text-center">
                            <p class="text-sm text-slate-400 italic">Tiada hebahan terkini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Death Records -->
            <div class="rounded-3xl bg-white p-1 shadow-sm border border-slate-100 overflow-hidden">
                <div class="flex items-center justify-between px-5 py-4 border-b border-slate-50">
                    <h3 class="font-bold text-slate-900">Rekod Kematian Baru</h3>
                    <a href="{{ route('death-records.index') }}" class="text-xs font-semibold text-primary-600 hover:text-primary-700">Lihat Semua</a>
                </div>
                <div class="p-4 space-y-4">
                    @forelse($recentDeaths as $item)
                        <div class="flex items-center gap-4 p-3 rounded-2xl transition-all hover:bg-slate-50">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-50 text-rose-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-sm text-slate-900 truncate">{{ $item->full_name }}</p>
                                <p class="text-[11px] text-slate-400">Kembali ke rahmatullah pada {{ $item->death_time->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex rounded-lg bg-slate-100 px-2 py-1 text-[10px] font-bold text-slate-600 uppercase">
                                    {{ $item->place }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="py-10 text-center">
                            <p class="text-sm text-slate-400 italic">Tiada rekod kematian baru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


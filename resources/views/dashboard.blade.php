<x-app-layout>
    <x-slot name="header">
        <p class="ui-label">Pantauan Harian</p>
        <div class="flex flex-col gap-2 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <h2 class="ui-title">Dashboard Pentadbiran Masjid</h2>
                <p class="ui-subtitle">Pantau ahli kariah, kutipan, dokumen dan hebahan dari satu ruang kerja yang lebih jelas.</p>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8">
        <section class="grid gap-6 xl:grid-cols-[1.35fr_0.65fr]">
            <div class="ui-panel overflow-hidden p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr]">
                    <div class="space-y-6">
                        <div>
                            <p class="ui-label">Keadaan Semasa</p>
                            <h3 class="mt-3 max-w-2xl text-3xl font-black tracking-[-0.04em] text-slate-900 sm:text-4xl">
                                Semua operasi kariah boleh dipantau dengan cepat tanpa paparan yang berserabut.
                            </h3>
                            <p class="mt-4 max-w-xl text-sm leading-7 text-slate-600">
                                Gunakan papan pemuka ini untuk melihat trend kutipan, aktiviti terkini dan rekod penting yang perlu diberi perhatian oleh pentadbir.
                            </p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-3">
                            <div class="ui-panel-muted p-4">
                                <p class="ui-label">Anak Kariah</p>
                                <p class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-900">{{ number_format($stats['members']) }}</p>
                                <p class="mt-2 text-sm text-slate-500">Rekod ahli aktif dalam sistem.</p>
                            </div>
                            <div class="ui-panel-muted p-4">
                                <p class="ui-label">Jumlah Kutipan</p>
                                <p class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-900">RM {{ number_format($stats['payments'], 0) }}</p>
                                <p class="mt-2 text-sm text-slate-500">Nilai kutipan yang telah direkodkan.</p>
                            </div>
                            <div class="ui-panel-muted p-4">
                                <p class="ui-label">Dokumen</p>
                                <p class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-900">{{ number_format($stats['documents']) }}</p>
                                <p class="mt-2 text-sm text-slate-500">Fail yang tersedia untuk semakan segera.</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[1.75rem] bg-slate-900 p-6 text-white shadow-[0_30px_80px_-40px_rgba(15,23,42,0.9)]">
                        <p class="text-[0.72rem] font-bold uppercase tracking-[0.28em] text-primary-200/80">Tindakan Pantas</p>
                        <div class="mt-6 space-y-3">
                            <a href="{{ route('members.create') }}" class="flex items-center justify-between rounded-2xl bg-white/10 px-4 py-4 transition hover:bg-white/15">
                                <div>
                                    <p class="text-sm font-bold">Daftar ahli baru</p>
                                    <p class="mt-1 text-xs uppercase tracking-[0.18em] text-slate-300">Anak kariah</p>
                                </div>
                                <span class="text-primary-200">+</span>
                            </a>
                            <a href="{{ route('announcements.create') }}" class="flex items-center justify-between rounded-2xl bg-white/10 px-4 py-4 transition hover:bg-white/15">
                                <div>
                                    <p class="text-sm font-bold">Keluarkan hebahan</p>
                                    <p class="mt-1 text-xs uppercase tracking-[0.18em] text-slate-300">Makluman jemaah</p>
                                </div>
                                <span class="text-primary-200">+</span>
                            </a>
                            <a href="{{ route('documents.create') }}" class="flex items-center justify-between rounded-2xl bg-white/10 px-4 py-4 transition hover:bg-white/15">
                                <div>
                                    <p class="text-sm font-bold">Muat naik dokumen</p>
                                    <p class="mt-1 text-xs uppercase tracking-[0.18em] text-slate-300">Arkib digital</p>
                                </div>
                                <span class="text-primary-200">+</span>
                            </a>
                        </div>

                        <div class="mt-8 rounded-[1.5rem] border border-white/10 bg-white/5 p-4">
                            <p class="text-xs font-bold uppercase tracking-[0.24em] text-slate-300">Fokus Hari Ini</p>
                            <p class="mt-3 text-2xl font-black tracking-[-0.04em]">{{ number_format($stats['announcements']) }}</p>
                            <p class="mt-2 text-sm text-slate-300">Jumlah hebahan yang telah diterbitkan untuk makluman komuniti.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="ui-panel p-6">
                    <p class="ui-label">Angka Penting</p>
                    <div class="mt-5 space-y-4">
                        <div class="flex items-center justify-between rounded-2xl bg-slate-50/80 px-4 py-3">
                            <span class="text-sm font-semibold text-slate-500">AJK Masjid</span>
                            <span class="text-xl font-black text-slate-900">{{ number_format($stats['committeeMembers']) }}</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl bg-slate-50/80 px-4 py-3">
                            <span class="text-sm font-semibold text-slate-500">Rekod kematian</span>
                            <span class="text-xl font-black text-slate-900">{{ number_format($stats['deathRecords']) }}</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl bg-slate-50/80 px-4 py-3">
                            <span class="text-sm font-semibold text-slate-500">Peti dokumen</span>
                            <span class="text-xl font-black text-slate-900">{{ number_format($stats['documents']) }}</span>
                        </div>
                    </div>
                </div>

                <div class="ui-panel p-6">
                    <p class="ui-label">Waktu Solat</p>
                    @php
                        $salahTimes = [
                            ['name' => 'Subuh', 'time' => '05:58', 'active' => false],
                            ['name' => 'Zohor', 'time' => '13:14', 'active' => true],
                            ['name' => 'Asar', 'time' => '16:25', 'active' => false],
                            ['name' => 'Maghrib', 'time' => '19:16', 'active' => false],
                            ['name' => 'Isyak', 'time' => '20:25', 'active' => false],
                        ];
                    @endphp
                    <div class="mt-5 space-y-3">
                        @foreach($salahTimes as $salah)
                            <div class="flex items-center justify-between rounded-2xl px-4 py-3 {{ $salah['active'] ? 'bg-primary-600 text-white shadow-[0_22px_45px_-28px_rgba(22,127,75,0.9)]' : 'bg-slate-50 text-slate-700' }}">
                                <span class="text-sm font-bold uppercase tracking-[0.18em]">{{ $salah['name'] }}</span>
                                <span class="text-base font-black">{{ $salah['time'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $statsConfig = [
                    ['label' => 'Anak Kariah', 'value' => $stats['members'], 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'primary', 'desc' => 'Jumlah ahli direkodkan'],
                    ['label' => 'AJK Masjid', 'value' => $stats['committeeMembers'], 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857', 'color' => 'success', 'desc' => 'Barisan pentadbiran aktif'],
                    ['label' => 'Jumlah Kutipan', 'value' => 'RM '.number_format($stats['payments'], 0), 'icon' => 'M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4m0-8c2.21 0 4 1.79 4 4s-1.79 4-4 4m0-8v8m0 0c-1.657 0-3 1.12-3 2.5S10.343 21 12 21s3-1.12 3-2.5S13.657 16 12 16', 'color' => 'warning', 'desc' => 'Kutipan keseluruhan semasa'],
                    ['label' => 'Peti Dokumen', 'value' => $stats['documents'], 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2', 'color' => 'danger', 'desc' => 'Dokumen dalam simpanan'],
                ];

                $colorMap = [
                    'primary' => ['bg' => 'bg-primary-50', 'text' => 'text-primary-600'],
                    'success' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
                    'warning' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-600'],
                    'danger' => ['bg' => 'bg-rose-50', 'text' => 'text-rose-600'],
                ];
            @endphp

            @foreach($statsConfig as $stat)
                <div class="ui-stat-card">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl {{ $colorMap[$stat['color']]['bg'] }} {{ $colorMap[$stat['color']]['text'] }}">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="ui-label">{{ $stat['label'] }}</p>
                            <p class="mt-3 text-2xl font-black tracking-[-0.04em] text-slate-900">{{ $stat['value'] }}</p>
                        </div>
                    </div>
                    <p class="mt-5 text-sm text-slate-500">{{ $stat['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <section class="grid gap-6 xl:grid-cols-[1.35fr_0.65fr]">
            <div class="ui-table-shell">
                <div class="flex flex-col gap-6 border-b border-slate-100 px-6 py-6 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                    <div>
                        <p class="ui-label">Aktiviti & Hebahan</p>
                        <h3 class="mt-2 text-2xl font-black tracking-[-0.04em] text-slate-900">Makluman terkini komuniti</h3>
                    </div>
                    <a href="{{ route('announcements.create') }}" class="ui-button-primary">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Hebahan Baru
                    </a>
                </div>

                <div class="grid gap-0 lg:grid-cols-[1.2fr_0.8fr]">
                    <div class="space-y-4 p-6 sm:p-8">
                        @forelse($recentAnnouncements as $item)
                            <div class="rounded-[1.5rem] border border-slate-100 bg-white/70 p-5 transition hover:border-primary-200 hover:bg-primary-50/40">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex items-start gap-4">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-50 text-primary-600">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-base font-bold text-slate-900">{{ $item->title }}</p>
                                            <p class="mt-2 text-sm leading-6 text-slate-500">{{ \Illuminate\Support\Str::limit($item->body, 120) }}</p>
                                        </div>
                                    </div>
                                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold uppercase tracking-[0.18em] text-emerald-700">Aktif</span>
                                </div>
                                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-4 text-sm text-slate-500">
                                    <span>{{ $item->created_at->format('d M Y') }}</span>
                                    <a href="{{ route('announcements.edit', $item) }}" class="font-semibold text-primary-700 transition hover:text-primary-800">Semak</a>
                                </div>
                            </div>
                        @empty
                            <div class="rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50/70 px-6 py-12 text-center text-sm text-slate-500">
                                Tiada hebahan terbaru direkodkan lagi.
                            </div>
                        @endforelse
                    </div>

                    <div class="border-t border-slate-100 p-6 sm:border-l sm:border-t-0 sm:p-8">
                        <div class="rounded-[1.75rem] bg-slate-900 p-6 text-white">
                            <p class="text-[0.72rem] font-bold uppercase tracking-[0.24em] text-primary-200/80">Panduan</p>
                            <h4 class="mt-3 text-2xl font-black tracking-[-0.04em]">Manual pentadbir</h4>
                            <p class="mt-3 text-sm leading-7 text-slate-300">
                                Pastikan staf boleh rujuk aliran kerja asas seperti semakan profil, kutipan dan dokumen rasmi.
                            </p>
                            <a href="{{ route('reports.payments') }}" class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-primary-200 transition hover:text-primary-100">
                                Buka laporan kutipan
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>

                        <div class="mt-6 space-y-3">
                            <p class="ui-label">Rekod Kematian Terkini</p>
                            @forelse($recentDeaths as $death)
                                <div class="rounded-2xl bg-slate-50 px-4 py-4">
                                    <p class="text-sm font-bold text-slate-900">{{ $death->full_name }}</p>
                                    <p class="mt-1 text-sm text-slate-500">{{ optional($death->death_time)->format('d M Y, h:i A') ?? 'Tarikh belum direkodkan' }}</p>
                                </div>
                            @empty
                                <div class="rounded-2xl border border-dashed border-slate-200 px-4 py-6 text-sm text-slate-500">
                                    Tiada rekod kematian terbaru.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>

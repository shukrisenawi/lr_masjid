<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-semibold text-slate-900">Dashboard Masjid</h2>
            <p class="text-sm text-slate-500">Ringkasan modul pengurusan kariah</p>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                    <p class="text-sm text-slate-500">Jumlah Anak Khariah</p>
                    <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $stats['members'] }}</p>
                </div>
                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                    <p class="text-sm text-slate-500">AJK Masjid</p>
                    <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $stats['committeeMembers'] }}</p>
                </div>
                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                    <p class="text-sm text-slate-500">Hebahan</p>
                    <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $stats['announcements'] }}</p>
                </div>
                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                    <p class="text-sm text-slate-500">Dokumen</p>
                    <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $stats['documents'] }}</p>
                </div>
                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                    <p class="text-sm text-slate-500">Rekod Kematian</p>
                    <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $stats['deathRecords'] }}</p>
                </div>
                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                    <p class="text-sm text-slate-500">Jumlah Bayaran (RM)</p>
                    <p class="mt-1 text-3xl font-semibold text-slate-900">{{ number_format($stats['payments'], 2) }}</p>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                    <h3 class="text-lg font-semibold text-slate-900">Hebahan Terkini</h3>
                    <div class="mt-4 space-y-3">
                        @forelse($recentAnnouncements as $item)
                            <div class="rounded-xl bg-slate-50 p-3">
                                <p class="font-medium text-slate-900">{{ $item->title }}</p>
                                <p class="text-xs text-slate-500">{{ optional($item->published_at)->format('d/m/Y H:i') ?? $item->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500">Tiada hebahan lagi.</p>
                        @endforelse
                    </div>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                    <h3 class="text-lg font-semibold text-slate-900">Rekod Kematian Terkini</h3>
                    <div class="mt-4 space-y-3">
                        @forelse($recentDeaths as $item)
                            <div class="rounded-xl bg-slate-50 p-3">
                                <p class="font-medium text-slate-900">{{ $item->full_name }}</p>
                                <p class="text-xs text-slate-500">{{ $item->death_time->format('d/m/Y H:i') }} | {{ $item->place }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500">Tiada rekod kematian lagi.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

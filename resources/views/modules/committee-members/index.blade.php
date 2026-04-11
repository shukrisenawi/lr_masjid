<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-slate-900">AJK Masjid</h2>
            <a href="{{ route('committee-members.create') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Tambah AJK</a>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-4 flex gap-2">
                <a href="{{ route('committee-members.index') }}" class="rounded-lg bg-slate-900 px-3 py-2 text-sm text-white">Senarai AJK</a>
                <a href="{{ route('committee-members.create') }}" class="rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-700">Tambah AJK</a>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                @forelse($committeeMembers as $item)
                    <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                        <p class="text-lg font-semibold text-slate-900">{{ $item->member->full_name }}</p>
                        <p class="text-sm text-slate-500">{{ $item->position->name }}</p>
                        <p class="mt-2 text-xs text-slate-500">Tempoh: {{ optional($item->start_date)->format('d/m/Y') ?? '-' }} - {{ optional($item->end_date)->format('d/m/Y') ?? 'Aktif' }}</p>
                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('committee-members.edit', $item) }}" class="rounded-lg bg-slate-100 px-3 py-2 text-xs text-slate-700">Edit</a>
                            <form method="POST" action="{{ route('committee-members.destroy', $item) }}" onsubmit="return confirm('Padam AJK ini?')">
                                @csrf @method('DELETE')
                                <button class="rounded-lg bg-rose-100 px-3 py-2 text-xs text-rose-700">Padam</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="rounded-xl bg-white p-4 text-sm text-slate-500 ring-1 ring-slate-100">Tiada data AJK.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

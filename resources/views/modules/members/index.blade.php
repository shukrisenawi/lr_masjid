<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-slate-900">Senarai Anak Khariah</h2>
            <a href="{{ route('members.create') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Tambah Anak Khariah</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-4 flex gap-2">
                <a href="{{ route('members.index') }}" class="rounded-lg bg-slate-900 px-3 py-2 text-sm text-white">Senarai Ahli</a>
                <a href="{{ route('members.create') }}" class="rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-700">Tambah Ahli</a>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                @forelse($members as $member)
                    <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                        <div class="flex items-center gap-3">
                            @if($member->avatar_path)
                                <img src="{{ asset('storage/'.$member->avatar_path) }}" class="h-14 w-14 rounded-xl object-cover" alt="avatar">
                            @else
                                <div class="grid h-14 w-14 place-items-center rounded-xl bg-slate-900 text-white">{{ strtoupper(substr($member->full_name, 0, 1)) }}</div>
                            @endif
                            <div>
                                <p class="font-semibold text-slate-900">{{ $member->full_name }}</p>
                                <p class="text-xs text-slate-500">Ketua keluarga: {{ $member->head_of_family_name }}</p>
                                <p class="text-xs text-slate-500">{{ $member->village?->name ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="mt-3 text-sm text-slate-600">
                            <p>Nama samaran: {{ $member->nickname ?: '-' }}</p>
                            <p>Jantina: {{ $member->gender }}</p>
                            <p>No HP: {{ $member->phone ?: '-' }}</p>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('members.edit', $member) }}" class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-medium text-slate-700">Edit</a>
                            <form action="{{ route('members.destroy', $member) }}" method="POST" onsubmit="return confirm('Padam data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-lg bg-rose-100 px-3 py-2 text-xs font-medium text-rose-700">Padam</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="rounded-2xl bg-white p-5 text-sm text-slate-500 ring-1 ring-slate-100">Tiada data anak khariah.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

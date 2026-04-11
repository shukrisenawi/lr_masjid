<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">Anak Kariah</h2>
                <p class="text-slate-500">Senarai lengkap penduduk dan ahli kariah masjid.</p>
            </div>
            <a href="{{ route('members.create') }}" class="group inline-flex items-center gap-2 rounded-xl bg-primary-700 px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-primary-200 transition-all hover:bg-primary-800">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Ahli
            </a>
        </div>
    </x-slot>

    <div class="py-2">
        <div class="mb-8 flex flex-wrap gap-2">
            <a href="{{ route('members.index') }}" class="inline-flex items-center gap-2 rounded-xl bg-primary-700 px-4 py-2 text-sm font-medium text-white shadow-sm">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Senarai Ahli
            </a>
            <a href="{{ route('members.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2 text-sm font-medium text-slate-600 border border-slate-200 hover:bg-slate-50 transition-colors">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Ahli Baru
            </a>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($members as $member)
                <div class="group relative overflow-hidden rounded-3xl bg-white p-6 shadow-sm border border-slate-100 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/40">
                    <div class="flex items-center gap-4">
                        @if($member->avatar_path)
                            <img src="{{ asset('storage/'.$member->avatar_path) }}" class="h-16 w-16 rounded-2xl object-cover ring-4 ring-slate-50 group-hover:ring-primary-50 transition-all" alt="avatar">
                        @else
                            <div class="grid h-16 w-16 place-items-center rounded-2xl bg-gradient-to-br from-primary-600 to-primary-800 text-xl font-bold text-white shadow-inner">
                                {{ strtoupper(substr($member->full_name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-lg font-bold text-slate-900 group-hover:text-primary-700 transition-colors">{{ $member->full_name }}</p>
                            <p class="text-xs font-medium text-primary-600/70">{{ $member->village?->name ?? 'Kampung Tidak Dinyatakan' }}</p>
                        </div>
                    </div>

                    <div class="mt-6 space-y-3 rounded-2xl bg-slate-50/50 p-4 text-xs">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Ketua Keluarga</span>
                            <span class="font-bold text-slate-700">{{ $member->head_of_family_name ?: '-' }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Jantina</span>
                            <span class="inline-flex items-center rounded-full bg-white px-2 py-0.5 font-bold text-slate-600 border border-slate-100">{{ $member->gender }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">No. Telefon</span>
                            <span class="font-bold text-slate-700">{{ $member->phone ?: '-' }}</span>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-2">
                        <a href="{{ route('members.edit', $member) }}" class="flex-1 inline-flex justify-center items-center gap-2 rounded-xl bg-white px-3 py-2.5 text-xs font-bold text-slate-600 border border-slate-200 hover:bg-slate-50 hover:border-slate-300 transition-all">
                             <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Kemaskini
                        </a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" class="shrink-0" onsubmit="return confirm('Padam data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-100 hover:text-rose-700 transition-all">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center rounded-3xl bg-white border border-dashed border-slate-200">
                    <p class="text-slate-400">Tiada data anak khariah ditemui.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>


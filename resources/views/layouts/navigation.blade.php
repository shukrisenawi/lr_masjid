<nav x-data="{ open: false }" class="border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="grid h-10 w-10 place-items-center rounded-xl bg-slate-900 text-sm font-semibold text-white">MS</div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Sistem Masjid</p>
                        <p class="text-xs text-slate-500">Pengurusan Kariah</p>
                    </div>
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:gap-3">
                <span class="text-sm font-medium text-slate-700">{{ Auth::user()->full_name ?? Auth::user()->name }}</span>
                <a href="{{ route('profile.edit') }}" class="rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-600 hover:bg-slate-100">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="rounded-lg bg-slate-900 px-3 py-2 text-sm text-white">Log Keluar</button>
                </form>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="rounded-md p-2 text-slate-600 hover:bg-slate-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        @php
            $navLinks = [
                ['label' => 'Dashboard', 'route' => 'dashboard'],
                ['label' => 'Anak Khariah', 'route' => 'members.index'],
                ['label' => 'AJK Masjid', 'route' => 'committee-members.index'],
                ['label' => 'Kematian', 'route' => 'death-records.index'],
                ['label' => 'Bayaran', 'route' => 'payment-assignments.index'],
                ['label' => 'Hebahan', 'route' => 'announcements.index'],
                ['label' => 'Dokumen', 'route' => 'documents.index'],
                ['label' => 'Rujukan', 'route' => 'positions.index'],
            ];
        @endphp

        <div class="hidden gap-2 overflow-x-auto pb-4 sm:flex">
            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}"
                   class="rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs(str_replace('.index', '.*', $link['route'])) || request()->routeIs($link['route']) ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-slate-200 bg-white p-3 sm:hidden">
        @foreach ($navLinks as $link)
            <a href="{{ route($link['route']) }}" class="mb-2 block rounded-lg px-3 py-2 text-sm {{ request()->routeIs(str_replace('.index', '.*', $link['route'])) || request()->routeIs($link['route']) ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-600' }}">
                {{ $link['label'] }}
            </a>
        @endforeach

        <div class="mt-4 border-t border-slate-200 pt-3">
            <a href="{{ route('profile.edit') }}" class="mb-2 block rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-700">Profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full rounded-lg bg-slate-900 px-3 py-2 text-left text-sm text-white">Log Keluar</button>
            </form>
        </div>
    </div>
</nav>

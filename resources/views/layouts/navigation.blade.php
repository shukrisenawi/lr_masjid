<aside
    x-cloak
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-80 transform border-r border-white/10 bg-sidebar transition-transform duration-300 ease-in-out lg:static lg:translate-x-0"
>
    <div class="flex h-full flex-col">
        <div class="px-6 pb-6 pt-8">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-4">
                <div class="grid h-14 w-14 place-items-center rounded-[1.5rem] bg-gradient-to-br from-primary-400 via-primary-500 to-primary-700 text-white shadow-[0_18px_40px_-20px_rgba(36,159,97,0.8)]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <p class="text-[0.72rem] font-bold uppercase tracking-[0.28em] text-primary-200/90">Sistem Kariah</p>
                    <h1 class="text-xl font-black tracking-[-0.04em] text-white">{{ config('app.name') }}</h1>
                    <p class="mt-1 text-sm font-medium text-sidebar-text">Panel pentadbiran masjid yang lebih kemas dan fokus.</p>
                </div>
            </a>
        </div>

        <div class="px-6">
            <div class="rounded-[1.75rem] border border-white/10 bg-white/5 p-4">
                <p class="text-[0.72rem] font-bold uppercase tracking-[0.24em] text-primary-200/80">Ringkasan</p>
                <div class="mt-4 grid grid-cols-2 gap-3">
                    <div class="rounded-2xl bg-white/5 px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sidebar-text">Peranan</p>
                        <p class="mt-2 text-sm font-bold text-white">{{ Auth::user()->role?->name ?? 'Pentadbir' }}</p>
                    </div>
                    <div class="rounded-2xl bg-white/5 px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sidebar-text">Akses</p>
                        <p class="mt-2 text-sm font-bold text-white">Aktif</p>
                    </div>
                </div>
            </div>
        </div>

        <nav class="custom-scrollbar flex-1 space-y-2 overflow-y-auto px-4 py-6">
            @php
                $navItems = [
                    ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['label' => 'Anak Kariah', 'route' => 'members.index', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                    ['label' => 'AJK Masjid', 'route' => 'committee-members.index', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                    ['label' => 'Rekod Kematian', 'route' => 'death-records.index', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                    ['label' => 'Kutipan & Bayaran', 'route' => 'payment-assignments.index', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
                    ['label' => 'Hebahan Terkini', 'route' => 'announcements.index', 'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z'],
                    ['label' => 'Peti Dokumen', 'route' => 'documents.index', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ];
            @endphp

            <div class="px-3">
                <p class="text-[0.72rem] font-bold uppercase tracking-[0.24em] text-sidebar-text/70">Menu Utama</p>
            </div>

            @foreach ($navItems as $item)
                @php
                    $isActive = request()->routeIs($item['route']) || (str_contains($item['route'], '.index') && request()->routeIs(str_replace('.index', '.*', $item['route'])));
                @endphp
                <a href="{{ route($item['route']) }}"
                   class="group flex items-center justify-between rounded-[1.3rem] px-4 py-3.5 text-sm font-bold transition-all duration-200 {{ $isActive ? 'bg-gradient-to-r from-primary-500/25 to-transparent text-white shadow-[inset_0_0_0_1px_rgba(110,231,183,0.18)]' : 'text-sidebar-text hover:bg-sidebar-hover hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl {{ $isActive ? 'bg-primary-500/20 text-primary-100' : 'bg-white/5 text-sidebar-text group-hover:bg-white/10 group-hover:text-primary-200' }}">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                            </svg>
                        </span>
                        <div>
                            <p>{{ $item['label'] }}</p>
                            <p class="mt-0.5 text-[0.68rem] font-semibold uppercase tracking-[0.18em] {{ $isActive ? 'text-primary-100/70' : 'text-sidebar-text/70 group-hover:text-sidebar-text' }}">
                                {{ str($item['label'])->replace(' & ', ' dan ') }}
                            </p>
                        </div>
                    </div>
                    <svg class="h-4 w-4 {{ $isActive ? 'text-primary-200' : 'text-sidebar-text/60 group-hover:text-primary-200' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endforeach
        </nav>

        <div class="p-6 pt-2">
            <div x-data="{ userMenu: false }" class="relative">
                <button @click="userMenu = !userMenu" class="flex w-full items-center gap-3 rounded-[1.5rem] border border-white/10 bg-white/5 p-4 text-left shadow-[0_20px_40px_-30px_rgba(0,0,0,0.75)] transition hover:bg-white/10">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br from-primary-400 to-primary-700 text-sm font-black text-white uppercase shadow-lg shadow-primary-500/20">
                        @if (Auth::user()->avatar_path)
                            <img src="{{ asset('storage/'.Auth::user()->avatar_path) }}" alt="Avatar pengguna" class="h-full w-full object-cover">
                        @else
                            {{ substr(Auth::user()->name, 0, 2) }}
                        @endif
                    </div>
                    <div class="min-w-0 flex-1 text-left">
                        <p class="truncate text-sm font-bold leading-none tracking-tight text-white capitalize">{{ Auth::user()->name }}</p>
                        <p class="mt-1 truncate text-xs font-semibold uppercase tracking-[0.2em] text-sidebar-text">{{ Auth::user()->role?->name ?? 'Pentadbir' }}</p>
                    </div>
                    <svg class="h-4 w-4 text-sidebar-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="userMenu"
                     @click.away="userMenu = false"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     class="absolute bottom-full left-0 z-50 mb-4 w-full origin-bottom rounded-[1.5rem] border border-white/10 bg-sidebar-hover p-2 shadow-2xl">
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/5">
                        Profil Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-rose-300 transition-colors hover:bg-rose-400/10">
                            Log Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</aside>

<div
    x-show="sidebarOpen"
    @click="sidebarOpen = false"
    x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-40 bg-slate-950/45 backdrop-blur-sm lg:hidden"
></div>

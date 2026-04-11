<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-black tracking-tight text-slate-900 capitalize">Transactions</h2>
    </x-slot>

    <div class="py-2 space-y-10">
        <!-- Stats Cards Grid (Paces Style) -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $statsConfig = [
                    ['label' => 'Anak Kariah', 'value' => $stats['members'], 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'primary', 'desc' => 'Total Members'],
                    ['label' => 'AJK Masjid', 'value' => $stats['committeeMembers'], 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857', 'color' => 'success', 'desc' => 'Received Income'],
                    ['label' => 'Kutipan RM', 'value' => number_format($stats['payments'], 0), 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'warning', 'desc' => 'Pending Payments'],
                    ['label' => 'Peti Dokumen', 'value' => $stats['documents'], 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2', 'color' => 'danger', 'desc' => 'Refunded Income'],
                ];
                
                $colorMap = [
                    'primary' => ['bg' => 'bg-primary-50', 'text' => 'text-primary-600', 'shadow' => 'shadow-primary-100'],
                    'success' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-500', 'shadow' => 'shadow-emerald-100'],
                    'warning' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-500', 'shadow' => 'shadow-amber-100'],
                    'danger' => ['bg' => 'bg-rose-50', 'text' => 'text-rose-500', 'shadow' => 'shadow-rose-100'],
                ];
            @endphp

            @foreach($statsConfig as $stat)
                <div class="relative overflow-hidden rounded-[1.5rem] bg-white p-8 shadow-sm border border-slate-100 transition-all hover:shadow-xl hover:shadow-slate-200/50">
                    <div class="flex items-center justify-between">
                         <div class="flex h-12 w-12 items-center justify-center rounded-full {{ $colorMap[$stat['color']]['bg'] }} {{ $colorMap[$stat['color']]['text'] }}">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-black text-slate-900 tracking-tight">${{ $stat['value'] }}</p>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $stat['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Transactions Table Row (Paces Style Header) -->
        <div class="rounded-[1.5rem] bg-white shadow-sm border border-slate-100 overflow-hidden">
             <div class="p-8 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" placeholder="Search transactions..." class="w-full md:w-80 rounded-xl border-slate-100 bg-slate-50 py-3 pl-10 pr-4 text-sm font-medium focus:ring-2 focus:ring-primary-100 transition-all">
                </div>
                <div class="flex items-center gap-3">
                     <button class="inline-flex items-center gap-2 rounded-xl bg-primary-600 px-5 py-3 text-xs font-bold text-white shadow-lg shadow-primary-500/20 hover:bg-primary-700 transition-all">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Transaction
                    </button>
                    <div class="flex items-center gap-2 rounded-xl border border-slate-100 px-4 py-3 text-xs font-bold text-slate-600">
                        Filter By: 
                        <span class="flex items-center gap-1 text-slate-400">Type <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg></span>
                    </div>
                </div>
            </div>

            <!-- Content Area (Quick Actions & Announcements) -->
            <div class="grid lg:grid-cols-3 divide-x divide-slate-50 border-t border-slate-50">
                <div class="lg:col-span-2 p-8 space-y-8">
                     <h3 class="text-lg font-black text-slate-900">Aktiviti Semasa</h3>
                     <div class="space-y-4">
                        @forelse($recentAnnouncements as $item)
                            <div class="flex items-center justify-between p-4 rounded-2xl border border-slate-50 hover:bg-slate-50/50 transition-all group">
                                <div class="flex items-center gap-4">
                                    <div class="h-10 w-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-primary-50 group-hover:text-primary-600 transition-all">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">{{ $item->title }}</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">{{ $item->created_at->format('d M, Y') }}</p>
                                    </div>
                                </div>
                                <span class="rounded-lg bg-emerald-50 px-3 py-1 text-[10px] font-bold text-emerald-600 uppercase tracking-tighter">Published</span>
                            </div>
                        @empty
                            <p class="text-center py-10 text-sm italic text-slate-400">Tiada rekod terbaru.</p>
                        @endforelse
                     </div>
                </div>

                <!-- Right Widget Area -->
                <div class="p-8 space-y-10">
                    <div>
                        <h3 class="text-lg font-black text-slate-900 mb-6 uppercase tracking-tighter">Waktu Solat</h3>
                        <div class="space-y-3">
                             @php
                                $salahTimes = [
                                    ['name' => 'Subuh', 'time' => '05:58', 'active' => false],
                                    ['name' => 'Zohor', 'time' => '13:14', 'active' => true],
                                    ['name' => 'Asar', 'time' => '16:25', 'active' => false],
                                    ['name' => 'Maghrib', 'time' => '19:16', 'active' => false],
                                    ['name' => 'Isyak', 'time' => '20:25', 'active' => false],
                                ];
                            @endphp
                            @foreach($salahTimes as $salah)
                                <div class="flex items-center justify-between p-3.5 rounded-2xl {{ $salah['active'] ? 'bg-primary-600 text-white shadow-xl shadow-primary-200' : 'bg-slate-50 text-slate-600' }} transition-all">
                                    <span class="text-xs font-black uppercase tracking-widest">{{ $salah['name'] }}</span>
                                    <span class="text-sm font-black">{{ $salah['time'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quick Links Widget -->
                    <div class="rounded-3xl bg-slate-900 p-6 shadow-2xl relative overflow-hidden group">
                         <div class="absolute top-0 right-0 p-4 opacity-10 transform translate-x-2 -translate-y-2 group-hover:scale-110 transition-transform">
                             <svg class="h-20 w-20 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2L4.5,20.29L5.21,21L12,18L18.79,21L19.5,20.29L12,2Z" />
                            </svg>
                        </div>
                        <h4 class="text-white font-black text-sm uppercase tracking-widest mb-4 relative z-10">Manual Admin</h4>
                        <p class="text-slate-400 text-[11px] font-medium leading-relaxed relative z-10 mb-6">Muat turun dokumen panduan penggunaan sistem digital masjid.</p>
                        <a href="#" class="inline-flex items-center gap-2 text-xs font-black text-primary-400 uppercase tracking-widest hover:text-primary-300 transition-colors relative z-10">
                            Download PDF 
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


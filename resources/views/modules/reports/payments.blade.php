<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-slate-900">Laporan Bayaran (Graf)</h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-6xl space-y-4 px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                <p class="text-sm text-slate-500">Jumlah Keseluruhan Bayaran</p>
                <p class="text-3xl font-semibold text-slate-900">RM {{ number_format((float) $grandTotal, 2) }}</p>
            </div>

            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
                <div class="space-y-4">
                    @php $max = max($totals->max() ?? 0, 1); @endphp
                    @forelse($labels as $index => $label)
                        @php
                            $value = (float) $totals[$index];
                            $percentage = ($value / $max) * 100;
                        @endphp
                        <div>
                            <div class="mb-1 flex items-center justify-between text-sm">
                                <span class="font-medium text-slate-700">{{ $label }}</span>
                                <span class="text-slate-500">RM {{ number_format($value, 2) }}</span>
                            </div>
                            <div class="h-3 rounded-full bg-slate-100">
                                <div class="h-3 rounded-full bg-slate-900" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">Belum ada data bayaran.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

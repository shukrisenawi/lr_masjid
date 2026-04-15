<x-app-layout>
    <x-slot name="header">
        <p class="ui-label">Kutipan & Penetapan</p>
        <div class="flex flex-col gap-4 xl:flex-row xl:items-end xl:justify-between">
            <div>
                <h2 class="ui-title">Bayaran Ahli</h2>
                <p class="ui-subtitle">Urus penetapan bayaran setiap ahli dengan susun atur yang lebih jelas dan mudah diimbas.</p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:justify-end">
                <a href="{{ route('reports.payments') }}" class="ui-button-secondary min-w-[11rem]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m6 16l-4-16M5 9h14M4 15h14" />
                    </svg>
                    Laporan Graf
                </a>
                <a href="{{ route('payment-assignments.create') }}" class="ui-button-primary min-w-[12rem]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Penetapan
                </a>
            </div>
        </div>
    </x-slot>

    <div class="space-y-6">
        <section class="ui-panel overflow-hidden">
            <div class="flex flex-col gap-4 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                <div>
                    <p class="ui-label">Senarai Aktif</p>
                    <h3 class="mt-2 text-2xl font-black tracking-[-0.04em] text-slate-900">Penetapan bayaran ahli</h3>
                </div>
                <a href="{{ route('payment-records.index') }}" class="ui-button-secondary">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6m3 6V7m3 10v-4m3 4V9M5 21h14" />
                    </svg>
                    Lihat Rekod Bayaran Individu
                </a>
            </div>

            <div class="overflow-x-auto px-6 py-4 sm:px-8">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead>
                        <tr class="text-slate-500">
                            <th class="pb-4 text-sm font-bold uppercase tracking-[0.16em]">Anak Kariah</th>
                            <th class="pb-4 text-sm font-bold uppercase tracking-[0.16em]">Jenis Bayaran</th>
                            <th class="pb-4 text-sm font-bold uppercase tracking-[0.16em]">Status</th>
                            <th class="pb-4 text-sm font-bold uppercase tracking-[0.16em]">Rekod Bayaran</th>
                            <th class="pb-4 text-right text-sm font-bold uppercase tracking-[0.16em]">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assignments as $assignment)
                            <tr class="border-t border-slate-100">
                                <td class="py-4">
                                    <div>
                                        <p class="font-bold text-slate-900">{{ $assignment->member->full_name }}</p>
                                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">Ahli berdaftar</p>
                                    </div>
                                </td>
                                <td class="py-4 text-slate-600">
                                    <p class="font-semibold text-slate-800">{{ $assignment->paymentType->name }}</p>
                                    <p class="mt-1 text-xs uppercase tracking-[0.16em] text-slate-400">{{ $assignment->paymentType->method }}</p>
                                </td>
                                <td class="py-4">
                                    <span class="inline-flex rounded-full bg-primary-50 px-3 py-1 text-xs font-bold uppercase tracking-[0.18em] text-primary-700">
                                        {{ $assignment->status }}
                                    </span>
                                </td>
                                <td class="py-4">
                                    <span class="inline-flex min-w-[2.5rem] justify-center rounded-2xl bg-slate-100 px-3 py-1.5 text-sm font-bold text-slate-700">
                                        {{ $assignment->records->count() }}
                                    </span>
                                </td>
                                <td class="py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('payment-assignments.edit', $assignment) }}" class="inline-flex items-center rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs font-bold uppercase tracking-[0.16em] text-slate-700 transition hover:border-primary-200 hover:bg-primary-50 hover:text-primary-700">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('payment-assignments.destroy', $assignment) }}" onsubmit="return confirm('Padam penetapan?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="inline-flex items-center rounded-xl bg-rose-50 px-3 py-2 text-xs font-bold uppercase tracking-[0.16em] text-rose-700 transition hover:bg-rose-100">
                                                Padam
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center">
                                    <div class="rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50/70 px-6 py-10 text-sm text-slate-500">
                                        Tiada penetapan bayaran direkodkan lagi.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>

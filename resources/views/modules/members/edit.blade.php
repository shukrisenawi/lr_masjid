<x-app-layout>
    <x-slot name="header"><h2 class="text-2xl font-semibold text-slate-900">Kemaskini Anak Khariah</h2></x-slot>
    <div class="py-6">
        <div class="mx-auto mb-4 flex max-w-5xl gap-2">
            <a href="{{ route('members.index') }}" class="rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-700">Senarai Ahli</a>
            <a href="{{ route('members.create') }}" class="rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-700">Tambah Ahli</a>
        </div>
        <div class="mx-auto max-w-5xl rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <form method="POST" action="{{ route('members.update', $member) }}" enctype="multipart/form-data">
                @method('PUT')
                @include('modules.members._form')
            </form>
        </div>
    </div>
</x-app-layout>

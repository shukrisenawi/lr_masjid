<x-app-layout>
    <x-slot name="header"><h2 class="text-2xl font-semibold text-slate-900">Kemaskini AJK</h2></x-slot>
    <div class="py-6">
        <div class="mx-auto max-w-4xl rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <form method="POST" action="{{ route('committee-members.update', $committeeMember) }}">
                @method('PUT')
                @include('modules.committee-members._form')
            </form>
        </div>
    </div>
</x-app-layout>

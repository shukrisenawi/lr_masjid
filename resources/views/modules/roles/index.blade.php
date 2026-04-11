<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between"><h2 class="text-2xl font-semibold text-slate-900">Role Pengguna</h2><a href="{{ route('roles.create') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Tambah Role</a></div>
    </x-slot>
    <div class="py-6"><div class="mx-auto max-w-5xl rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-100">
        @include('modules._reference-tabs')
        <table class="w-full text-left text-sm"><thead><tr class="text-slate-500"><th class="pb-3">Nama</th><th class="pb-3"></th></tr></thead><tbody>
            @foreach($roles as $role)
                <tr class="border-t border-slate-100"><td class="py-3 font-medium text-slate-800">{{ $role->name }}</td><td class="py-3 text-right"><a href="{{ route('roles.edit', $role) }}" class="mr-2 rounded bg-slate-100 px-2 py-1 text-xs">Edit</a><form method="POST" action="{{ route('roles.destroy', $role) }}" class="inline" onsubmit="return confirm('Padam role?')">@csrf @method('DELETE')<button class="rounded bg-rose-100 px-2 py-1 text-xs text-rose-700">Padam</button></form></td></tr>
            @endforeach
        </tbody></table>
    </div></div>
</x-app-layout>

<div class="mb-4 flex flex-wrap gap-2">
    <a href="{{ route('roles.index') }}" class="rounded-lg px-3 py-2 text-sm {{ request()->routeIs('roles.*') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700' }}">Role</a>
    <a href="{{ route('positions.index') }}" class="rounded-lg px-3 py-2 text-sm {{ request()->routeIs('positions.*') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700' }}">Jawatan</a>
    <a href="{{ route('villages.index') }}" class="rounded-lg px-3 py-2 text-sm {{ request()->routeIs('villages.*') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700' }}">Kampung</a>
    <a href="{{ route('document-categories.index') }}" class="rounded-lg px-3 py-2 text-sm {{ request()->routeIs('document-categories.*') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700' }}">Kategori Dokumen</a>
    <a href="{{ route('payment-types.index') }}" class="rounded-lg px-3 py-2 text-sm {{ request()->routeIs('payment-types.*') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700' }}">Jenis Bayaran</a>
    <a href="{{ route('community-groups.index') }}" class="rounded-lg px-3 py-2 text-sm {{ request()->routeIs('community-groups.*') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700' }}">Kumpulan Kampung</a>
</div>

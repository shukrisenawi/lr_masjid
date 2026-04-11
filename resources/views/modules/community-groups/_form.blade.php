@csrf
<label class="mb-1 block text-sm">Nama Kumpulan</label><input name="name" value="{{ old('name', $communityGroup->name ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Keterangan</label><input name="description" value="{{ old('description', $communityGroup->description ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Pilih Anak Khariah</label>
<select name="member_ids[]" multiple class="h-60 w-full rounded-lg border-slate-300">
    @php $selected = old('member_ids', isset($communityGroup) ? $communityGroup->members->pluck('id')->toArray() : []); @endphp
    @foreach($members as $member)
        <option value="{{ $member->id }}" @selected(in_array($member->id, $selected))>{{ $member->full_name }}</option>
    @endforeach
</select>
<div class="mt-6 flex gap-2"><button class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Simpan</button><a href="{{ route('community-groups.index') }}" class="rounded-lg bg-slate-100 px-4 py-2 text-sm">Batal</a></div>

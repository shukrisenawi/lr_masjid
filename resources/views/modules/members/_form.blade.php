@csrf
<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Gambar Avatar</label>
        <input type="file" name="avatar" class="w-full rounded-lg border-slate-300 text-sm">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Nama Ketua Keluarga</label>
        <input type="text" name="head_of_family_name" value="{{ old('head_of_family_name', $member->head_of_family_name ?? '') }}" class="w-full rounded-lg border-slate-300">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Nama Penuh</label>
        <input type="text" name="full_name" value="{{ old('full_name', $member->full_name ?? '') }}" class="w-full rounded-lg border-slate-300">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Nama Samaran</label>
        <input type="text" name="nickname" value="{{ old('nickname', $member->nickname ?? '') }}" class="w-full rounded-lg border-slate-300">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Jantina</label>
        <select name="gender" class="w-full rounded-lg border-slate-300">
            <option value="Lelaki" @selected(old('gender', $member->gender ?? '') === 'Lelaki')>Lelaki</option>
            <option value="Perempuan" @selected(old('gender', $member->gender ?? '') === 'Perempuan')>Perempuan</option>
        </select>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Tarikh Lahir</label>
        <input type="date" name="date_of_birth" value="{{ old('date_of_birth', isset($member) && $member->date_of_birth ? $member->date_of_birth->format('Y-m-d') : '') }}" class="w-full rounded-lg border-slate-300">
    </div>
    <div class="md:col-span-2">
        <label class="mb-1 block text-sm font-medium text-slate-600">Alamat</label>
        <textarea name="address" rows="2" class="w-full rounded-lg border-slate-300">{{ old('address', $member->address ?? '') }}</textarea>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Kampung</label>
        <select name="village_id" class="w-full rounded-lg border-slate-300">
            <option value="">Pilih Kampung</option>
            @foreach($villages as $village)
                <option value="{{ $village->id }}" @selected((string) old('village_id', $member->village_id ?? '') === (string) $village->id)>{{ $village->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">No HP</label>
        <input type="text" name="phone" value="{{ old('phone', $member->phone ?? '') }}" class="w-full rounded-lg border-slate-300">
    </div>
</div>
<div class="mt-6 flex gap-2">
    <button class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Simpan</button>
    <a href="{{ route('members.index') }}" class="rounded-lg bg-slate-100 px-4 py-2 text-sm text-slate-700">Batal</a>
</div>

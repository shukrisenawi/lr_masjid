@csrf
<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Nama Anak Khariah</label>
        <select name="member_id" class="w-full rounded-lg border-slate-300">
            @foreach($members as $member)
                <option value="{{ $member->id }}" @selected((string) old('member_id', $committeeMember->member_id ?? '') === (string) $member->id)>{{ $member->full_name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Jawatan</label>
        <select name="position_id" class="w-full rounded-lg border-slate-300">
            @foreach($positions as $position)
                <option value="{{ $position->id }}" @selected((string) old('position_id', $committeeMember->position_id ?? '') === (string) $position->id)>{{ $position->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Tarikh Mula</label>
        <input type="date" name="start_date" value="{{ old('start_date', isset($committeeMember) && $committeeMember->start_date ? $committeeMember->start_date->format('Y-m-d') : '') }}" class="w-full rounded-lg border-slate-300">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-600">Tarikh Tamat</label>
        <input type="date" name="end_date" value="{{ old('end_date', isset($committeeMember) && $committeeMember->end_date ? $committeeMember->end_date->format('Y-m-d') : '') }}" class="w-full rounded-lg border-slate-300">
    </div>
    <div class="md:col-span-2">
        <label class="mb-1 block text-sm font-medium text-slate-600">Nota</label>
        <input type="text" name="notes" value="{{ old('notes', $committeeMember->notes ?? '') }}" class="w-full rounded-lg border-slate-300">
    </div>
</div>
<div class="mt-6 flex gap-2">
    <button class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Simpan</button>
    <a href="{{ route('committee-members.index') }}" class="rounded-lg bg-slate-100 px-4 py-2 text-sm text-slate-700">Batal</a>
</div>

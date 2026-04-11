@csrf
<label class="mb-1 block text-sm">Nama Penuh</label><input name="full_name" value="{{ old('full_name', $deathRecord->full_name ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Nama Samaran</label><input name="nickname" value="{{ old('nickname', $deathRecord->nickname ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Masa Kematian</label><input type="datetime-local" name="death_time" value="{{ old('death_time', isset($deathRecord) ? $deathRecord->death_time->format('Y-m-d\TH:i') : '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Tempat</label><input name="place" value="{{ old('place', $deathRecord->place ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Kampung</label><select name="village_id" class="w-full rounded-lg border-slate-300"><option value="">Pilih</option>@foreach($villages as $village)<option value="{{ $village->id }}" @selected((string) old('village_id', $deathRecord->village_id ?? '') === (string) $village->id)>{{ $village->name }}</option>@endforeach</select>
<label class="mb-1 mt-4 block text-sm">Gambar</label><input type="file" name="image" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Nota</label><textarea name="notes" rows="3" class="w-full rounded-lg border-slate-300">{{ old('notes', $deathRecord->notes ?? '') }}</textarea>
<div class="mt-6 flex gap-2"><button class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Simpan</button><a href="{{ route('death-records.index') }}" class="rounded-lg bg-slate-100 px-4 py-2 text-sm">Batal</a></div>

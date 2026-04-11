@csrf
<label class="mb-1 block text-sm">Tajuk</label><input name="title" value="{{ old('title', $announcement->title ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Tarikh Hebahan</label><input type="date" name="published_at" value="{{ old('published_at', isset($announcement) && $announcement->published_at ? $announcement->published_at->format('Y-m-d') : '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Gambar</label><input type="file" name="image" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Maklumat</label><textarea name="body" rows="5" class="w-full rounded-lg border-slate-300">{{ old('body', $announcement->body ?? '') }}</textarea>
<div class="mt-6 flex gap-2"><button class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Simpan</button><a href="{{ route('announcements.index') }}" class="rounded-lg bg-slate-100 px-4 py-2 text-sm">Batal</a></div>

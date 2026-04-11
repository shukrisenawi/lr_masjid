@csrf
<label class="mb-1 block text-sm">Kategori</label><select name="document_category_id" class="w-full rounded-lg border-slate-300">@foreach($categories as $category)<option value="{{ $category->id }}" @selected((string) old('document_category_id', $document->document_category_id ?? '') === (string) $category->id)>{{ $category->name }}</option>@endforeach</select>
<label class="mb-1 mt-4 block text-sm">Tajuk Dokumen</label><input name="title" value="{{ old('title', $document->title ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Tarikh</label><input type="date" name="uploaded_at" value="{{ old('uploaded_at', isset($document) && $document->uploaded_at ? $document->uploaded_at->format('Y-m-d') : '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Fail Dokumen</label><input type="file" name="file" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Nota</label><textarea name="notes" rows="3" class="w-full rounded-lg border-slate-300">{{ old('notes', $document->notes ?? '') }}</textarea>
<div class="mt-6 flex gap-2"><button class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Simpan</button><a href="{{ route('documents.index') }}" class="rounded-lg bg-slate-100 px-4 py-2 text-sm">Batal</a></div>

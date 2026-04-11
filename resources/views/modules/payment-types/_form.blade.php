@csrf
<label class="mb-1 block text-sm">Nama Jenis Bayaran</label><input name="name" value="{{ old('name', $paymentType->name ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Kaedah</label><select name="method" class="w-full rounded-lg border-slate-300">@foreach($methods as $method)<option value="{{ $method }}" @selected(old('method', $paymentType->method ?? '') === $method)>{{ $method }}</option>@endforeach</select>
<label class="mb-1 mt-4 block text-sm">Amaun (RM)</label><input type="number" step="0.01" name="amount" value="{{ old('amount', $paymentType->amount ?? '') }}" class="w-full rounded-lg border-slate-300">
<label class="mb-1 mt-4 block text-sm">Keterangan</label><input name="description" value="{{ old('description', $paymentType->description ?? '') }}" class="w-full rounded-lg border-slate-300">
<div class="mt-6 flex gap-2"><button class="rounded-lg bg-slate-900 px-4 py-2 text-sm text-white">Simpan</button><a href="{{ route('payment-types.index') }}" class="rounded-lg bg-slate-100 px-4 py-2 text-sm">Batal</a></div>

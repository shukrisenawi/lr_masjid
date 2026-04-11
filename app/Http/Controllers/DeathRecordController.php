<?php

namespace App\Http\Controllers;

use App\Models\DeathRecord;
use App\Models\Village;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DeathRecordController extends Controller
{
    public function index(): View
    {
        return view('modules.death-records.index', [
            'deathRecords' => DeathRecord::query()->with('village')->latest('death_time')->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.death-records.create', [
            'villages' => Village::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:150'],
            'nickname' => ['nullable', 'string', 'max:100'],
            'death_time' => ['required', 'date'],
            'place' => ['required', 'string', 'max:150'],
            'village_id' => ['nullable', 'exists:villages,id'],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $data['image_path'] = $request->file('image')?->store('death-records', 'public');
        unset($data['image']);

        DeathRecord::query()->create($data);

        return redirect()->route('death-records.index')->with('success', 'Rekod kematian berjaya ditambah.');
    }

    public function edit(DeathRecord $death_record): View
    {
        return view('modules.death-records.edit', [
            'deathRecord' => $death_record,
            'villages' => Village::query()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, DeathRecord $death_record): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:150'],
            'nickname' => ['nullable', 'string', 'max:100'],
            'death_time' => ['required', 'date'],
            'place' => ['required', 'string', 'max:150'],
            'village_id' => ['nullable', 'exists:villages,id'],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($death_record->image_path) {
                Storage::disk('public')->delete($death_record->image_path);
            }
            $data['image_path'] = $request->file('image')->store('death-records', 'public');
        }

        unset($data['image']);
        $death_record->update($data);

        return redirect()->route('death-records.index')->with('success', 'Rekod kematian berjaya dikemaskini.');
    }

    public function destroy(DeathRecord $death_record): RedirectResponse
    {
        if ($death_record->image_path) {
            Storage::disk('public')->delete($death_record->image_path);
        }
        $death_record->delete();

        return redirect()->route('death-records.index')->with('success', 'Rekod kematian berjaya dipadam.');
    }
}

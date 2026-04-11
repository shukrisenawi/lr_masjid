<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VillageController extends Controller
{
    public function index(): View
    {
        return view('modules.villages.index', [
            'villages' => Village::query()->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.villages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:villages,name'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        Village::query()->create($data);

        return redirect()->route('villages.index')->with('success', 'Kampung berjaya ditambah.');
    }

    public function edit(Village $village): View
    {
        return view('modules.villages.edit', compact('village'));
    }

    public function update(Request $request, Village $village): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:villages,name,'.$village->id],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $village->update($data);

        return redirect()->route('villages.index')->with('success', 'Kampung berjaya dikemaskini.');
    }

    public function destroy(Village $village): RedirectResponse
    {
        $village->delete();

        return redirect()->route('villages.index')->with('success', 'Kampung berjaya dipadam.');
    }
}

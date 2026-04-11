<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PositionController extends Controller
{
    public function index(): View
    {
        return view('modules.positions.index', [
            'positions' => Position::query()->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.positions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:positions,name'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        Position::query()->create($data);

        return redirect()->route('positions.index')->with('success', 'Jawatan berjaya ditambah.');
    }

    public function edit(Position $position): View
    {
        return view('modules.positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:positions,name,'.$position->id],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $position->update($data);

        return redirect()->route('positions.index')->with('success', 'Jawatan berjaya dikemaskini.');
    }

    public function destroy(Position $position): RedirectResponse
    {
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Jawatan berjaya dipadam.');
    }
}

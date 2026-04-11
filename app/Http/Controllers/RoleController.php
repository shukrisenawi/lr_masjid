<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        return view('modules.roles.index', [
            'roles' => Role::query()->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.roles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:roles,name'],
        ]);

        Role::query()->create($data);

        return redirect()->route('roles.index')->with('success', 'Role berjaya ditambah.');
    }

    public function edit(Role $role): View
    {
        return view('modules.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:roles,name,'.$role->id],
        ]);

        $role->update($data);

        return redirect()->route('roles.index')->with('success', 'Role berjaya dikemaskini.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role berjaya dipadam.');
    }
}

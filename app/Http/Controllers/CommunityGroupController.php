<?php

namespace App\Http\Controllers;

use App\Models\CommunityGroup;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommunityGroupController extends Controller
{
    public function index(): View
    {
        return view('modules.community-groups.index', [
            'communityGroups' => CommunityGroup::query()->withCount('members')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.community-groups.create', [
            'members' => Member::query()->orderBy('full_name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150', 'unique:community_groups,name'],
            'description' => ['nullable', 'string', 'max:255'],
            'member_ids' => ['array'],
            'member_ids.*' => ['exists:members,id'],
        ]);

        $group = CommunityGroup::query()->create($data);
        $group->members()->sync($request->input('member_ids', []));

        return redirect()->route('community-groups.index')->with('success', 'Kumpulan kampung berjaya ditambah.');
    }

    public function edit(CommunityGroup $community_group): View
    {
        return view('modules.community-groups.edit', [
            'communityGroup' => $community_group->load('members'),
            'members' => Member::query()->orderBy('full_name')->get(),
        ]);
    }

    public function update(Request $request, CommunityGroup $community_group): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150', 'unique:community_groups,name,'.$community_group->id],
            'description' => ['nullable', 'string', 'max:255'],
            'member_ids' => ['array'],
            'member_ids.*' => ['exists:members,id'],
        ]);

        $community_group->update($data);
        $community_group->members()->sync($request->input('member_ids', []));

        return redirect()->route('community-groups.index')->with('success', 'Kumpulan kampung berjaya dikemaskini.');
    }

    public function destroy(CommunityGroup $community_group): RedirectResponse
    {
        $community_group->delete();

        return redirect()->route('community-groups.index')->with('success', 'Kumpulan kampung berjaya dipadam.');
    }
}

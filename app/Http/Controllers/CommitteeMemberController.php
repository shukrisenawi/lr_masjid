<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;
use App\Models\Member;
use App\Models\Position;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommitteeMemberController extends Controller
{
    public function index(): View
    {
        return view('modules.committee-members.index', [
            'committeeMembers' => CommitteeMember::query()->with(['member', 'position'])->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.committee-members.create', [
            'members' => Member::query()->orderBy('full_name')->get(),
            'positions' => Position::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'position_id' => ['required', 'exists:positions,id'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'notes' => ['nullable', 'string', 'max:255'],
        ]);

        CommitteeMember::query()->create($data);

        return redirect()->route('committee-members.index')->with('success', 'AJK berjaya ditambah.');
    }

    public function edit(CommitteeMember $committee_member): View
    {
        return view('modules.committee-members.edit', [
            'committeeMember' => $committee_member,
            'members' => Member::query()->orderBy('full_name')->get(),
            'positions' => Position::query()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, CommitteeMember $committee_member): RedirectResponse
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'position_id' => ['required', 'exists:positions,id'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'notes' => ['nullable', 'string', 'max:255'],
        ]);

        $committee_member->update($data);

        return redirect()->route('committee-members.index')->with('success', 'AJK berjaya dikemaskini.');
    }

    public function destroy(CommitteeMember $committee_member): RedirectResponse
    {
        $committee_member->delete();

        return redirect()->route('committee-members.index')->with('success', 'AJK berjaya dipadam.');
    }
}

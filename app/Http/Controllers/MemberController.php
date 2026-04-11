<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Village;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        return view('modules.members.index', [
            'members' => Member::query()->with('village')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.members.create', [
            'villages' => Village::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatePayload($request);
        $data['avatar_path'] = $request->file('avatar')?->store('members', 'public');

        Member::query()->create($data);

        return redirect()->route('members.index')->with('success', 'Anak khariah berjaya ditambah.');
    }

    public function edit(Member $member): View
    {
        return view('modules.members.edit', [
            'member' => $member,
            'villages' => Village::query()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Member $member): RedirectResponse
    {
        $data = $this->validatePayload($request);

        if ($request->hasFile('avatar')) {
            if ($member->avatar_path) {
                Storage::disk('public')->delete($member->avatar_path);
            }
            $data['avatar_path'] = $request->file('avatar')->store('members', 'public');
        }

        $member->update($data);

        return redirect()->route('members.index')->with('success', 'Anak khariah berjaya dikemaskini.');
    }

    public function destroy(Member $member): RedirectResponse
    {
        if ($member->avatar_path) {
            Storage::disk('public')->delete($member->avatar_path);
        }

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anak khariah berjaya dipadam.');
    }

    private function validatePayload(Request $request): array
    {
        return $request->validate([
            'head_of_family_name' => ['required', 'string', 'max:150'],
            'full_name' => ['required', 'string', 'max:150'],
            'nickname' => ['nullable', 'string', 'max:100'],
            'gender' => ['required', 'in:Lelaki,Perempuan'],
            'date_of_birth' => ['nullable', 'date'],
            'address' => ['nullable', 'string'],
            'village_id' => ['nullable', 'exists:villages,id'],
            'phone' => ['nullable', 'string', 'max:30'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}

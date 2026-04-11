<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    public function index(): View
    {
        return view('modules.announcements.index', [
            'announcements' => Announcement::query()->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.announcements.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'body' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $data['image_path'] = $request->file('image')?->store('announcements', 'public');
        unset($data['image']);

        Announcement::query()->create($data);

        return redirect()->route('announcements.index')->with('success', 'Hebahan berjaya ditambah.');
    }

    public function edit(Announcement $announcement): View
    {
        return view('modules.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'body' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($announcement->image_path) {
                Storage::disk('public')->delete($announcement->image_path);
            }
            $data['image_path'] = $request->file('image')->store('announcements', 'public');
        }

        unset($data['image']);
        $announcement->update($data);

        return redirect()->route('announcements.index')->with('success', 'Hebahan berjaya dikemaskini.');
    }

    public function destroy(Announcement $announcement): RedirectResponse
    {
        if ($announcement->image_path) {
            Storage::disk('public')->delete($announcement->image_path);
        }

        $announcement->delete();

        return redirect()->route('announcements.index')->with('success', 'Hebahan berjaya dipadam.');
    }
}

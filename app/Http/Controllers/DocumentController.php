<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DocumentController extends Controller
{
    public function index(): View
    {
        return view('modules.documents.index', [
            'documents' => Document::query()->with('category')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.documents.create', [
            'categories' => DocumentCategory::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'document_category_id' => ['required', 'exists:document_categories,id'],
            'title' => ['required', 'string', 'max:200'],
            'notes' => ['nullable', 'string'],
            'uploaded_at' => ['nullable', 'date'],
            'file' => ['required', 'file', 'max:10240'],
        ]);

        $data['file_path'] = $request->file('file')->store('documents', 'public');
        unset($data['file']);

        Document::query()->create($data);

        return redirect()->route('documents.index')->with('success', 'Dokumen berjaya dimuat naik.');
    }

    public function edit(Document $document): View
    {
        return view('modules.documents.edit', [
            'document' => $document,
            'categories' => DocumentCategory::query()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Document $document): RedirectResponse
    {
        $data = $request->validate([
            'document_category_id' => ['required', 'exists:document_categories,id'],
            'title' => ['required', 'string', 'max:200'],
            'notes' => ['nullable', 'string'],
            'uploaded_at' => ['nullable', 'date'],
            'file' => ['nullable', 'file', 'max:10240'],
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        unset($data['file']);
        $document->update($data);

        return redirect()->route('documents.index')->with('success', 'Dokumen berjaya dikemaskini.');
    }

    public function destroy(Document $document): RedirectResponse
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Dokumen berjaya dipadam.');
    }
}

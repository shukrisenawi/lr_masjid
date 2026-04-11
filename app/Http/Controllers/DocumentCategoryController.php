<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentCategoryController extends Controller
{
    public function index(): View
    {
        return view('modules.document-categories.index', [
            'categories' => DocumentCategory::query()->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('modules.document-categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:document_categories,name'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        DocumentCategory::query()->create($data);

        return redirect()->route('document-categories.index')->with('success', 'Kategori dokumen berjaya ditambah.');
    }

    public function edit(DocumentCategory $document_category): View
    {
        return view('modules.document-categories.edit', ['category' => $document_category]);
    }

    public function update(Request $request, DocumentCategory $document_category): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:document_categories,name,'.$document_category->id],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $document_category->update($data);

        return redirect()->route('document-categories.index')->with('success', 'Kategori dokumen berjaya dikemaskini.');
    }

    public function destroy(DocumentCategory $document_category): RedirectResponse
    {
        $document_category->delete();

        return redirect()->route('document-categories.index')->with('success', 'Kategori dokumen berjaya dipadam.');
    }
}

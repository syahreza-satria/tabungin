<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.settings.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // 2. Buat kategori baru
        Category::create($validated);

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->ignore($category->id),
            ],
        ]);

        // 2. Update data kategori
        $category->update($validated);

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        // 1. Hapus data kategori
        $category->delete();

        // 2. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::query()
            ->orderBy('name')
            ->get();

        return view('admin.blog.categories.index', compact('categories'));
    }

    public function create()
    {
        return redirect()->route('admin.blog.categories.index');
    }

    public function store(Request $request)
    {
        $validated = $this->validatePayload($request);

        $slug = $this->makeUniqueSlug($validated['slug'] ?? '', $validated['name']);

        $payload = [
            'name' => $validated['name'],
            'slug' => $slug,
        ];

        if (Schema::hasColumn('blog_categories', 'is_active')) {
            $payload['is_active'] = (bool) ($validated['is_active'] ?? false);
        }

        BlogCategory::create($payload);

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(BlogCategory $category)
    {
        return redirect()
            ->route('admin.blog.categories.index')
            ->with('open_edit_category_id', $category->id);
    }

    public function update(Request $request, BlogCategory $category)
    {
        $validated = $this->validatePayload($request);

        // Slug stays stable unless explicitly provided
        $slugInput = trim((string) ($validated['slug'] ?? ''));
        if ($slugInput !== '') {
            $category->slug = $this->makeUniqueSlug($slugInput, $validated['name'], $category->id);
        } elseif (trim((string) $category->slug) === '') {
            $category->slug = $this->makeUniqueSlug('', $validated['name'], $category->id);
        }

        $category->name = $validated['name'];

        if (Schema::hasColumn('blog_categories', 'is_active')) {
            $category->is_active = (bool) ($validated['is_active'] ?? false);
        }
        $category->save();

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(BlogCategory $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    private function validatePayload(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }

    private function makeUniqueSlug(string $slugInput, string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($slugInput !== '' ? $slugInput : $name);
        $slug = $base !== '' ? $base : Str::random(8);

        $i = 2;
        while (
            BlogCategory::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }
}

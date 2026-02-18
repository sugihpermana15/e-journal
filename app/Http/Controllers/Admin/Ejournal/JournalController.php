<?php

namespace App\Http\Controllers\Admin\Ejournal;

use App\Http\Controllers\Controller;
use App\Models\Ejournal\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::query()
            ->orderByDesc('created_at')
            ->get();

        return view('admin.ejournal.journals.index', compact('journals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'cover_file' => ['nullable', 'image', 'max:2048'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $slug = $this->makeUniqueSlug($validated['title']);

        $coverPath = null;
        if ($request->hasFile('cover_file')) {
            $coverPath = $request->file('cover_file')->store('ejournal/journals/covers', 'public');
        }

        Journal::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'cover_path' => $coverPath,
            'is_featured' => (bool) ($validated['is_featured'] ?? true),
            'is_published' => (bool) ($validated['is_published'] ?? true),
            'published_at' => $validated['published_at'] ?? null,
        ]);

        return redirect()
            ->route('admin.ejournal.journals.index')
            ->with('success', 'Journal created successfully.');
    }

    public function update(Request $request, Journal $journal)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'cover_file' => ['nullable', 'image', 'max:2048'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        // If title changes, keep slug stable unless it's empty
        if (empty($journal->slug)) {
            $journal->slug = $this->makeUniqueSlug($validated['title'], $journal->id);
        }

        if ($request->hasFile('cover_file')) {
            $journal->cover_path = $request->file('cover_file')->store('ejournal/journals/covers', 'public');
        }

        $journal->title = $validated['title'];
        $journal->category = $validated['category'] ?? null;
        $journal->short_description = $validated['short_description'] ?? null;
        $journal->is_featured = (bool) ($validated['is_featured'] ?? false);
        $journal->is_published = (bool) ($validated['is_published'] ?? false);
        $journal->published_at = $validated['published_at'] ?? null;

        $journal->save();

        return redirect()
            ->route('admin.ejournal.journals.index')
            ->with('success', 'Journal updated successfully.');
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();

        return redirect()
            ->route('admin.ejournal.journals.index')
            ->with('success', 'Journal deleted successfully.');
    }

    private function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base !== '' ? $base : Str::random(8);

        $i = 2;
        while (
            Journal::query()
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::query()
            ->with('blogCategory')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $categoriesQuery = BlogCategory::query();
        if (Schema::hasColumn('blog_categories', 'is_active')) {
            $categoriesQuery->where('is_active', true);
        }

        $categories = $categoriesQuery->orderBy('name')->get();

        return view('admin.blog.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePayload($request);

        $columns = $this->blogPostsColumns();

        $slug = $this->makeUniqueSlug($validated['slug'] ?? '', $validated['title']);

        $heroPath = null;
        if (isset($columns['hero_image_path']) && $request->hasFile('hero_file')) {
            $heroPath = $request->file('hero_file')->store('blog/posts/heroes', 'public');
        }

        $authorImagePath = null;
        if (isset($columns['author_image_path']) && $request->hasFile('author_image_file')) {
            $authorImagePath = $request->file('author_image_file')->store('blog/posts/authors', 'public');
        }

        $gallery1Path = null;
        if (isset($columns['detail_gallery_image_1_path']) && $request->hasFile('detail_gallery_image_1_file')) {
            $gallery1Path = $request->file('detail_gallery_image_1_file')->store('blog/posts/details', 'public');
        }

        $categoryId = $validated['category_id'] ?? null;
        $categorySlug = null;
        if ($categoryId && isset($columns['category'])) {
            $categorySlug = BlogCategory::query()->whereKey($categoryId)->value('slug');
        }

        $payload = [
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $categoryId,
            'tags' => $this->splitPipedTags($validated['tags_lines'] ?? ''),
            'author_name' => $validated['author_name'] ?? null,
            'author_image_path' => $authorImagePath,
            'hero_image_path' => $heroPath,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'] ?? null,
            'content_sections' => $this->normalizeContentSections($validated['content_sections'] ?? []),

            'detail_gallery_image_1_path' => $gallery1Path,
            'detail_gallery_image_1_caption' => $validated['detail_gallery_image_1_caption'] ?? null,
            'share_pinterest_url' => $validated['share_pinterest_url'] ?? null,
            'share_linkedin_url' => $validated['share_linkedin_url'] ?? null,
            'share_instagram_url' => $validated['share_instagram_url'] ?? null,
            'share_facebook_url' => $validated['share_facebook_url'] ?? null,

            'is_published' => (bool) ($validated['is_published'] ?? false),
            'published_at' => $validated['published_at'] ?? null,
            'created_by' => $request->user()?->id,
        ];

        $payload['category'] = $categorySlug;
        $payload = $this->filterPayloadToExistingColumns($payload, $columns);

        BlogPost::create($payload);

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Scientific News post created successfully.');
    }

    public function edit(BlogPost $post)
    {
        $categoriesQuery = BlogCategory::query();
        if (Schema::hasColumn('blog_categories', 'is_active')) {
            $categoriesQuery->where('is_active', true);
        }

        $categories = $categoriesQuery->orderBy('name')->get();

        return view('admin.blog.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $this->validatePayload($request);

        $columns = $this->blogPostsColumns();

        // Slug stays stable unless explicitly provided
        $slugInput = trim((string) ($validated['slug'] ?? ''));
        if ($slugInput !== '' && isset($columns['slug'])) {
            $post->slug = $this->makeUniqueSlug($slugInput, $validated['title'], $post->id);
        } elseif (trim((string) $post->slug) === '' && isset($columns['slug'])) {
            $post->slug = $this->makeUniqueSlug('', $validated['title'], $post->id);
        }

        $filePayload = [];
        if (isset($columns['hero_image_path']) && $request->hasFile('hero_file')) {
            $filePayload['hero_image_path'] = $request->file('hero_file')->store('blog/posts/heroes', 'public');
        }

        if (isset($columns['author_image_path']) && $request->hasFile('author_image_file')) {
            $filePayload['author_image_path'] = $request->file('author_image_file')->store('blog/posts/authors', 'public');
        }

        if (isset($columns['detail_gallery_image_1_path']) && $request->hasFile('detail_gallery_image_1_file')) {
            $filePayload['detail_gallery_image_1_path'] = $request->file('detail_gallery_image_1_file')->store('blog/posts/details', 'public');
        }

        $categoryId = $validated['category_id'] ?? null;
        $categorySlug = null;
        if ($categoryId && isset($columns['category'])) {
            $categorySlug = BlogCategory::query()->whereKey($categoryId)->value('slug');
        }

        $payload = [
            'title' => $validated['title'],
            'category_id' => $categoryId,
            'category' => $categorySlug,
            'tags' => $this->splitPipedTags($validated['tags_lines'] ?? ''),
            'author_name' => $validated['author_name'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'] ?? null,
            'content_sections' => $this->normalizeContentSections($validated['content_sections'] ?? []),
            'detail_gallery_image_1_caption' => $validated['detail_gallery_image_1_caption'] ?? null,
            'share_pinterest_url' => $validated['share_pinterest_url'] ?? null,
            'share_linkedin_url' => $validated['share_linkedin_url'] ?? null,
            'share_instagram_url' => $validated['share_instagram_url'] ?? null,
            'share_facebook_url' => $validated['share_facebook_url'] ?? null,

            'is_published' => (bool) ($validated['is_published'] ?? false),
            'published_at' => $validated['published_at'] ?? null,
        ];

        $payload = array_merge($payload, $filePayload);
        $payload = $this->filterPayloadToExistingColumns($payload, $columns);

        $post->fill($payload);
        $post->save();

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Scientific News post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Scientific News post deleted successfully.');
    }

    private function validatePayload(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'integer', 'exists:blog_categories,id'],
            'tags_lines' => ['nullable', 'string'],
            'author_name' => ['nullable', 'string', 'max:255'],
            'author_image_file' => ['nullable', 'image', 'max:2048'],
            'hero_file' => ['nullable', 'image', 'max:4096'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],

            'content_sections' => ['nullable', 'array'],
            'content_sections.*.title' => ['nullable', 'string', 'max:255'],
            'content_sections.*.text' => ['nullable', 'string'],

            'detail_gallery_image_1_file' => ['nullable', 'image', 'max:4096'],
            'detail_gallery_image_1_caption' => ['nullable', 'string'],
            'share_pinterest_url' => ['nullable', 'string', 'max:500'],
            'share_linkedin_url' => ['nullable', 'string', 'max:500'],
            'share_instagram_url' => ['nullable', 'string', 'max:500'],
            'share_facebook_url' => ['nullable', 'string', 'max:500'],

            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);
    }

    private function splitPipedTags(string $value): array
    {
        $parts = array_map('trim', preg_split('/[\n\r\|]+/', $value) ?: []);
        return array_values(array_filter($parts, fn ($p) => $p !== ''));
    }

    private function makeUniqueSlug(string $slugInput, string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($slugInput !== '' ? $slugInput : $title);
        $slug = $base !== '' ? $base : Str::random(8);

        $i = 2;
        while (
            BlogPost::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }

    private function normalizeContentSections(array $sections): array
    {
        $normalized = [];

        foreach ($sections as $section) {
            if (!is_array($section)) {
                continue;
            }

            $title = trim((string) ($section['title'] ?? ''));
            $text = trim((string) ($section['text'] ?? ''));

            if ($title === '' && $text === '') {
                continue;
            }

            $normalized[] = [
                'title' => $title,
                'text' => $text,
            ];
        }

        return $normalized;
    }

    private function blogPostsColumns(): array
    {
        return array_flip(Schema::getColumnListing('blog_posts'));
    }

    private function filterPayloadToExistingColumns(array $payload, array $columns): array
    {
        return array_intersect_key($payload, $columns);
    }
}

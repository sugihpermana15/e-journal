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

        $slug = $this->makeUniqueSlug($validated['slug'] ?? '', $validated['title']);

        $heroPath = null;
        if ($request->hasFile('hero_file')) {
            $heroPath = $request->file('hero_file')->store('blog/posts/heroes', 'public');
        }

        $authorImagePath = null;
        if ($request->hasFile('author_image_file')) {
            $authorImagePath = $request->file('author_image_file')->store('blog/posts/authors', 'public');
        }

        $gallery1Path = null;
        if ($request->hasFile('detail_gallery_image_1_file')) {
            $gallery1Path = $request->file('detail_gallery_image_1_file')->store('blog/posts/details', 'public');
        }

        $gallery2Path = null;
        if ($request->hasFile('detail_gallery_image_2_file')) {
            $gallery2Path = $request->file('detail_gallery_image_2_file')->store('blog/posts/details', 'public');
        }

        $quoteAuthorImagePath = null;
        if ($request->hasFile('detail_quote_author_image_file')) {
            $quoteAuthorImagePath = $request->file('detail_quote_author_image_file')->store('blog/posts/details', 'public');
        }

        $featureImagePath = null;
        if ($request->hasFile('detail_feature_image_file')) {
            $featureImagePath = $request->file('detail_feature_image_file')->store('blog/posts/details', 'public');
        }

        $categoryId = $validated['category_id'] ?? null;
        $categorySlug = null;
        if ($categoryId) {
            $categorySlug = BlogCategory::query()->whereKey($categoryId)->value('slug');
        }

        BlogPost::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $categoryId,
            'category' => $categorySlug,
            'tags' => $this->splitPipedTags($validated['tags_lines'] ?? ''),
            'author_name' => $validated['author_name'] ?? null,
            'author_image_path' => $authorImagePath,
            'hero_image_path' => $heroPath,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'] ?? null,

            'detail_gallery_image_1_path' => $gallery1Path,
            'detail_gallery_image_2_path' => $gallery2Path,
            'detail_title_2' => $validated['detail_title_2'] ?? null,
            'detail_text_2' => $validated['detail_text_2'] ?? null,
            'detail_text_3' => $validated['detail_text_3'] ?? null,
            'detail_text_4' => $validated['detail_text_4'] ?? null,
            'detail_title_3' => $validated['detail_title_3'] ?? null,
            'detail_points' => $this->splitLines($validated['detail_points_lines'] ?? ''),
            'detail_title_4' => $validated['detail_title_4'] ?? null,
            'detail_text_5' => $validated['detail_text_5'] ?? null,
            'detail_quote_text' => $validated['detail_quote_text'] ?? null,
            'detail_quote_author_name' => $validated['detail_quote_author_name'] ?? null,
            'detail_quote_author_image_path' => $quoteAuthorImagePath,
            'detail_title_5' => $validated['detail_title_5'] ?? null,
            'detail_text_6' => $validated['detail_text_6'] ?? null,
            'detail_feature_image_path' => $featureImagePath,
            'detail_feature_points' => $this->splitLines($validated['detail_feature_points_lines'] ?? ''),
            'detail_text_7' => $validated['detail_text_7'] ?? null,
            'share_pinterest_url' => $validated['share_pinterest_url'] ?? null,
            'share_linkedin_url' => $validated['share_linkedin_url'] ?? null,
            'share_instagram_url' => $validated['share_instagram_url'] ?? null,
            'share_facebook_url' => $validated['share_facebook_url'] ?? null,

            'is_published' => (bool) ($validated['is_published'] ?? false),
            'published_at' => $validated['published_at'] ?? null,
            'created_by' => $request->user()?->id,
        ]);

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Blog post created successfully.');
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

        // Slug stays stable unless explicitly provided
        $slugInput = trim((string) ($validated['slug'] ?? ''));
        if ($slugInput !== '') {
            $post->slug = $this->makeUniqueSlug($slugInput, $validated['title'], $post->id);
        } elseif (trim((string) $post->slug) === '') {
            $post->slug = $this->makeUniqueSlug('', $validated['title'], $post->id);
        }

        if ($request->hasFile('hero_file')) {
            $post->hero_image_path = $request->file('hero_file')->store('blog/posts/heroes', 'public');
        }

        if ($request->hasFile('author_image_file')) {
            $post->author_image_path = $request->file('author_image_file')->store('blog/posts/authors', 'public');
        }

        if ($request->hasFile('detail_gallery_image_1_file')) {
            $post->detail_gallery_image_1_path = $request->file('detail_gallery_image_1_file')->store('blog/posts/details', 'public');
        }

        if ($request->hasFile('detail_gallery_image_2_file')) {
            $post->detail_gallery_image_2_path = $request->file('detail_gallery_image_2_file')->store('blog/posts/details', 'public');
        }

        if ($request->hasFile('detail_quote_author_image_file')) {
            $post->detail_quote_author_image_path = $request->file('detail_quote_author_image_file')->store('blog/posts/details', 'public');
        }

        if ($request->hasFile('detail_feature_image_file')) {
            $post->detail_feature_image_path = $request->file('detail_feature_image_file')->store('blog/posts/details', 'public');
        }

        $categoryId = $validated['category_id'] ?? null;
        $categorySlug = null;
        if ($categoryId) {
            $categorySlug = BlogCategory::query()->whereKey($categoryId)->value('slug');
        }

        $post->title = $validated['title'];
        $post->category_id = $categoryId;
        $post->category = $categorySlug;
        $post->tags = $this->splitPipedTags($validated['tags_lines'] ?? '');
        $post->author_name = $validated['author_name'] ?? null;
        $post->excerpt = $validated['excerpt'] ?? null;
        $post->content = $validated['content'] ?? null;

        $post->detail_title_2 = $validated['detail_title_2'] ?? null;
        $post->detail_text_2 = $validated['detail_text_2'] ?? null;
        $post->detail_text_3 = $validated['detail_text_3'] ?? null;
        $post->detail_text_4 = $validated['detail_text_4'] ?? null;
        $post->detail_title_3 = $validated['detail_title_3'] ?? null;
        $post->detail_points = $this->splitLines($validated['detail_points_lines'] ?? '');
        $post->detail_title_4 = $validated['detail_title_4'] ?? null;
        $post->detail_text_5 = $validated['detail_text_5'] ?? null;
        $post->detail_quote_text = $validated['detail_quote_text'] ?? null;
        $post->detail_quote_author_name = $validated['detail_quote_author_name'] ?? null;
        $post->detail_title_5 = $validated['detail_title_5'] ?? null;
        $post->detail_text_6 = $validated['detail_text_6'] ?? null;
        $post->detail_feature_points = $this->splitLines($validated['detail_feature_points_lines'] ?? '');
        $post->detail_text_7 = $validated['detail_text_7'] ?? null;
        $post->share_pinterest_url = $validated['share_pinterest_url'] ?? null;
        $post->share_linkedin_url = $validated['share_linkedin_url'] ?? null;
        $post->share_instagram_url = $validated['share_instagram_url'] ?? null;
        $post->share_facebook_url = $validated['share_facebook_url'] ?? null;

        $post->is_published = (bool) ($validated['is_published'] ?? false);
        $post->published_at = $validated['published_at'] ?? null;

        $post->save();

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Blog post deleted successfully.');
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

            'detail_gallery_image_1_file' => ['nullable', 'image', 'max:4096'],
            'detail_gallery_image_2_file' => ['nullable', 'image', 'max:4096'],
            'detail_title_2' => ['nullable', 'string', 'max:255'],
            'detail_text_2' => ['nullable', 'string'],
            'detail_text_3' => ['nullable', 'string'],
            'detail_text_4' => ['nullable', 'string'],
            'detail_title_3' => ['nullable', 'string', 'max:255'],
            'detail_points_lines' => ['nullable', 'string'],
            'detail_title_4' => ['nullable', 'string', 'max:255'],
            'detail_text_5' => ['nullable', 'string'],
            'detail_quote_text' => ['nullable', 'string'],
            'detail_quote_author_name' => ['nullable', 'string', 'max:255'],
            'detail_quote_author_image_file' => ['nullable', 'image', 'max:2048'],
            'detail_title_5' => ['nullable', 'string', 'max:255'],
            'detail_text_6' => ['nullable', 'string'],
            'detail_feature_image_file' => ['nullable', 'image', 'max:4096'],
            'detail_feature_points_lines' => ['nullable', 'string'],
            'detail_text_7' => ['nullable', 'string'],
            'share_pinterest_url' => ['nullable', 'string', 'max:500'],
            'share_linkedin_url' => ['nullable', 'string', 'max:500'],
            'share_instagram_url' => ['nullable', 'string', 'max:500'],
            'share_facebook_url' => ['nullable', 'string', 'max:500'],

            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);
    }

    private function splitLines(string $value): array
    {
        $parts = array_map('trim', preg_split('/[\n\r]+/', $value) ?: []);
        return array_values(array_filter($parts, fn ($p) => $p !== ''));
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Ejournal\Journal;
use App\Models\Ejournal\Setting;
use App\Models\BlogPost;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $homeSettings = Setting::getValue('home', []);

        $featuredJournals = Journal::query()
            ->where('is_featured', true)
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $blogCards = BlogPost::query()
            ->with('blogCategory')
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get()
            ->map(function (BlogPost $post) {
                $sortDate = $post->published_at ?? $post->created_at;
                $day = $sortDate ? $sortDate->format('d') : '01';
                $month = $sortDate ? strtoupper($sortDate->format('M')) : 'JAN';

                // Homepage tags must follow master category only
                $tags = [];
                if ($post->relationLoaded('blogCategory') && $post->blogCategory) {
                    $tags[] = (string) $post->blogCategory->name;
                }

                $text = trim((string) ($post->excerpt ?? ''));
                if ($text === '') {
                    $text = Str::limit(trim(strip_tags((string) ($post->content ?? ''))), 110);
                }

                return [
                    // Keep schema compatible with existing blade: it will call asset('storage/' . image)
                    'image' => $post->hero_image_path ?: null,
                    'link_url' => route('blog-details', ['slug' => $post->slug]),
                    'day' => $day,
                    'month' => $month,
                    // Blade expects pipe-separated string
                    'tags' => implode(' | ', array_slice($tags, 0, 2)),
                    'title' => (string) $post->title,
                    'text' => $text,
                ];
            })
            ->all();

        return view('index', [
            'homeSettings' => is_array($homeSettings) ? $homeSettings : [],
            'featuredJournals' => $featuredJournals,
            'blogCards' => $blogCards,
            'blogCardsSource' => 'db',
        ]);
    }
}

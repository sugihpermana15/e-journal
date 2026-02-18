<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'category',
        'tags',
        'author_name',
        'author_image_path',
        'hero_image_path',
        'excerpt',
        'content',
        'detail_gallery_image_1_path',
        'detail_gallery_image_2_path',
        'detail_title_2',
        'detail_text_2',
        'detail_text_3',
        'detail_text_4',
        'detail_title_3',
        'detail_points',
        'detail_title_4',
        'detail_text_5',
        'detail_quote_text',
        'detail_quote_author_name',
        'detail_quote_author_image_path',
        'detail_title_5',
        'detail_text_6',
        'detail_feature_image_path',
        'detail_feature_points',
        'detail_text_7',
        'share_pinterest_url',
        'share_linkedin_url',
        'share_instagram_url',
        'share_facebook_url',
        'is_published',
        'published_at',
        'created_by',
    ];

    protected $casts = [
        'tags' => 'array',
        'detail_points' => 'array',
        'detail_feature_points' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}

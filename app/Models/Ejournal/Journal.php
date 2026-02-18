<?php

namespace App\Models\Ejournal;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'm_ejournal_journals';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'short_description',
        'cover_path',
        'is_featured',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'bool',
        'is_published' => 'bool',
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

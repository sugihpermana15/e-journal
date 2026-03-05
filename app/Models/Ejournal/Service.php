<?php

namespace App\Models\Ejournal;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'm_ejournal_services';

    protected $fillable = [
        'slug',
        'button_label',
        'icon',
        'title',
        'text',
        'small_label',
        'small_sublabel',
        'button_text',
        'image',
        'is_active',
        'sort_order',
        'detail',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'sort_order' => 'int',
        'detail' => 'array',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}

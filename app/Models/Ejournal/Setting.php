<?php

namespace App\Models\Ejournal;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'm_ejournal_settings';

    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $row = static::query()->where('key', $key)->first();

        if (!$row) {
            return $default;
        }

        return $row->value ?? $default;
    }

    public static function putValue(string $key, mixed $value): void
    {
        static::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}

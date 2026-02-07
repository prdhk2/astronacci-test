<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Video extends Model
{
    protected $table = 'video';

    protected $fillable = [
        'title',
        'slug',
        'video_url',
        'description',
        'is_premium',
        'published_at',
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'published_at' => 'datetime',
    ];

    /* =====================
     |  SCOPES
     ===================== */

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    public function scopeForUser(Builder $query, $user): Builder
    {
        $limit = $user->role?->video_limit;

        return $query
            ->published()
            ->when($limit, fn ($q) => $q->limit($limit));
    }
}


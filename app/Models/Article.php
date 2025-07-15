<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $casts = [
        'published' => 'boolean',
        'notifications' => 'array', 
    ];

    public function scopeUnPublished(Builder $query)
    {
        $query->where('published', false);
    }
}

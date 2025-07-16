<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $casts = [
        'published' => 'boolean',
        'notifications' => 'array', 
    ];

    public function scopeUnPublished(Builder $query)
    {
        $query->where('published', false);
    }

    public function getPhotoAttribute(): string
    {
        return preg_match('/^photos\/.*/', $this->photo_path) ? asset('storage/' . $this->photo_path) : $this->photo_path;
    }
}

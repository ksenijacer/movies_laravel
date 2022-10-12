<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genres;
use App\Models\Comment;
use App\Models\User;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genres::class);
    }

    public function scopeSearchByTitle($query, $title = '')
    {
        if ($title) {
            return $query->where('title', 'like', "%$title%");
        }
        return $query;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

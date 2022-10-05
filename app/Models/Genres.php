<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Genres extends Model
{
    use HasFactory;

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre', 'movies_id', 'genres_id');
    }
}

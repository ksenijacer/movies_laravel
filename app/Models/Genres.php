<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}

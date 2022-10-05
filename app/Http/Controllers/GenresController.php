<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index()
    {
        return response()->json(Genres::all());
    }
}

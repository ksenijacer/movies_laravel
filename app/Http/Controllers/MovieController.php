<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genres;
use Illuminate\Support\Facades\Auth;


class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all()->load('genres');

        // $movies = Movie::all();
        // $movies->genres()->attach('genres_id');

        return response()->json($movies);
    }

    public function store(StoreMovieRequest $request)
    {

        $data = $request->validated();

        $movie = Movie::create($data);

        return response()->json($movie);
    }

    public function show(Movie $movie)
    {
        $movie->load('genres');
        return response()->json($movie);
    }

    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $data = $request->validated();

        $movie->update($data);

        return response()->json($movie);
    }


    public function destroy(Movie $movie)
    {

        $movie->delete();

        return response(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genres;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 10);
        $movies = Movie::with('genres', 'user')->paginate($per_page);

        return response()->json($movies);
    }

    public function store(StoreMovieRequest $request)
    {
        if (!Auth::user()) {
            throw new UnauthorizedException('User not logged in.');
        }
        $data = $request->validated();

        $movie = Movie::create([
            'user_id' => Auth::user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'image_url' => $data['image_url']
        ]);

        $genresArr = $data['genres'];

        $genres = Genres::whereIn('type', $genresArr)->get();


        $movie->genres()->attach($genres);

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

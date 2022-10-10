<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;

class CommentController extends Controller
{
    public function show(Movie $movie)
    {
        $comments = $movie->comments()->with('user')->get();
        return response()->json($comments);
    }
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();

        $newComment = new Comment($validated);
        $newComment->user()->associate(Auth::user());
        $newComment->save();

        $newComment = $newComment->load('user');

        return response()->json($newComment);
    }
}

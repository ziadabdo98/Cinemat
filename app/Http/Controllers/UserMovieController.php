<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Carbon\Carbon;

class UserMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::query()->with('category');

        $movies->filter(request()->all());

        return view('movie.index', [
            'movies' => $movies->paginate(6)->withQueryString(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movie.show', [
            'movie' => $movie,
            'shows' => $movie->shows->where('date', '>', Carbon::now())->whereNotIn('remaining_seats', 0),
            'recommendations' => Movie::where('category_id', $movie->category_id)->where('id', '!=', $movie->id)->get()->collect(),
        ]);
    }
}

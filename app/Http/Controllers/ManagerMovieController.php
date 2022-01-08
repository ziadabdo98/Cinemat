<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Role;
use App\Models\Show;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManagerMovieController extends Controller
{
    public function dashboard()
    {
        $shows = Show::with('movie')->get();
        $num_of_shows = $shows->count();
        $num_of_movies = Movie::all()->count();
        $num_of_customers = User::all()->where('role.code', Role::CUSTOMER_CODE)->count();
        $upcoming_shows_count = $shows->whereBetween('date', [Carbon::now(), Carbon::now()->addWeek()])->count();

        return view('manager.dashboard', [
            'numOfShows' => $num_of_shows,
            'numOfMovies' => $num_of_movies,
            'numOfCustomers' => $num_of_customers,
            'showsNextWeek' => $upcoming_shows_count,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}

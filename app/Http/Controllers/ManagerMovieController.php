<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Role;
use App\Models\Show;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        return view('manager.movie-index', [
            'movies' => Movie::with('category')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.movie-create', [
            'categories' => Category::select(['id', 'title'])->get()->pluck('title', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate attributes
        $attr = $request->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'language' => ['required', 'min:1', 'max:255', 'alpha'],
            'rating' => ['required', 'numeric', 'lte:5', 'gte:0'],
            'release_date' => ['required', 'date'],
            'director' => ['required', 'min:1', 'max:255'],
            'maturity_rating' => ['required', 'min:1', 'max:255', 'alpha_dash'],
            'running_time' => ['required', 'date_format:H:i'],
            'storyline' => ['required', 'min:1', 'string'],
            'image' => ['required', 'image'],
        ]);

        $attr['image'] = request()->file('image')->store('posters');

        // store show
        $movie = Movie::create($attr);

        // redirect with success
        return redirect()->route('manager.movies.edit', $movie)->with([
            'flash' => 'success',
            'message' => 'Added movie successfully',
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
        return view('manager.movie-edit', [
            'movie' => $movie,
            'categories' => Category::select(['id', 'title'])->get()->pluck('title', 'id'),
        ]);
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
        $attr = $request->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'language' => ['required', 'min:1', 'max:255', 'alpha'],
            'rating' => ['required', 'numeric', 'lte:5', 'gte:0'],
            'release_date' => ['required', 'date'],
            'director' => ['required', 'min:1', 'max:255'],
            'maturity_rating' => ['required', 'min:1', 'max:255', 'alpha_dash'],
            'running_time' => ['required', 'date_format:H:i'],
            'storyline' => ['required', 'min:1', 'string'],
            'image' => ['image'],
        ]);

        if (isset($attr['image'])) {
            $attr['image'] = request()->file('image')->store('posters');
        }

        $movie->update($attr);

        // redirect to edit page with message
        return redirect()->route('manager.movies.edit', $movie)->with([
            'flash' => 'success',
            'message' => 'Updated Movie Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('manager.movies.index')->with([
            'flash' => 'success',
            'message' => 'Successfully deleted movie.',
        ]);
    }
}

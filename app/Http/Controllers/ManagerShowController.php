<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Room;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ManagerShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.show-index', [
            'shows' => Show::with('movie')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.show-create', [
            'movies' => Movie::select(['id', 'title'])->get()->pluck('title', 'id'),
            'rooms' => Room::select(['id', 'size'])->get()->pluck('size', 'id'),
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
            'movie_id' => ['required', Rule::exists(Movie::class, 'id')],
            'room_id' => ['required', Rule::exists(Room::class, 'id')],
            'date' => ['required', 'date', 'after:today'],
            'price' => ['required', 'numeric', 'gte:0'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'after:start_time'],
        ]);

        // remaining seats according to choice of room
        $attr['remaining_seats'] = Room::find($attr['room_id'])->size;

        // store show
        $show = Show::create($attr);

        // redirect with success
        return redirect()->route('manager.shows.edit', $show)->with([
            'flash' => 'success',
            'message' => 'Added show successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show)
    {
        return view('manager.show-show', [
            'show' => $show,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        return view('manager.show-edit', [
            'show' => $show,
            'movies' => Movie::select(['id', 'title'])->get()->pluck('title', 'id'),
            'rooms' => Room::select(['id', 'size'])->get()->pluck('size', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        // validate attributes
        $attr = $request->validate([
            'movie_id' => ['required', Rule::exists(Movie::class, 'id')],
            'date' => ['required', 'date', 'after:today'],
            'price' => ['required', 'numeric', 'gte:0'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'after:start_time'],
        ]);

        // delete room from attributes to avoid updating it
        unset($attr['room']);

        // update show
        $show->update($attr);

        // redirect to edit page with message
        return redirect()->route('manager.shows.edit', $show)->with([
            'flash' => 'success',
            'message' => 'Updated Show Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        $show->delete();

        return redirect()->route('manager.shows.index')->with([
            'flash' => 'success',
            'message' => 'Successfully deleted show.',
        ]);
    }
}

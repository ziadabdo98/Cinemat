<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMovieController;
use App\Models\Movie;
use App\Models\Role;
use App\Models\Show;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    $movies = Movie::all()->collect();
    return view('home.home', [
        'top4movies' => $movies->sortByDesc('rating')->take(4),
        'newest_movies' => $movies->sortByDesc('release_date')->take(6),
    ]);
})->name('home');

// Login/Register routes
Route::middleware('guest')->group(function () {
    Route::post('login', [SessionController::class, 'store']);
    Route::get('login', function () {return view('auth.login');})->name('login');

    Route::post('register', [UserController::class, 'store'])->name('register');
    Route::get('register', function () {
        return view('auth.register', [
            'roles' => Role::all()->collect()->whereNotIn('code', Role::ADMIN_CODE),
        ]);
    })->name('register');
});
Route::post('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

// Leads
Route::post('leads', [LeadController::class, 'store'])->middleware('guest')->name('leads');

// User Movies
Route::resource('movies', UserMovieController::class, ['only' => [
    'index', 'show',
]]);

// User Shows
Route::get('json/shows/{show}', function (Show $show) {
    $ret = $show->load('room')->toArray();
    $ret['reservations'] = $show->reservationsSeats();
    return $ret;
});

// Reservations
Route::resource('reservations', ReservationController::class)->middleware('auth');

// Dashboard
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/test', function () {
    $wants_manager = false;
    return redirect('/')->with([
        'flash' => 'success',
        'message' => $wants_manager ? 'Account created, you will remain customer until administration\'s approval.' : 'Your account has been successfully created!',
    ]);
});

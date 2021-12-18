<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Role;
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
    return view('home.home');
})->name('home');

// Login/Register routes
Route::middleware('guest')->group(function () {
    Route::post('login', [SessionController::class, 'store']);
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('register', [UserController::class, 'store']);
    Route::get('register', function () {
        return view('auth.register', [
            'roles' => Role::all()->collect()->whereNotIn('code', Role::ADMIN_CODE),
        ]);
    })->name('register');
});

Route::post('register', [UserController::class, 'store'])->name('register');
Route::post('logout', [SessionController::class, 'destroy'])->name('logout');

Route::get('/test', function () {
    $wants_manager = false;
    return redirect('/')->with([
        'flash' => 'success',
        'message' => $wants_manager ? 'Account created, you will remain customer until administration\'s approval.' : 'Your account has been successfully created!',
    ]);
});

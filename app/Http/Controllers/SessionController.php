<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function store()
    {
        // TODO: implement login here
        $credentials = request()->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials, isset($credentials['remember-me']) && $credentials['remember-me'] === 'yes')) {
            request()->session()->regenerate();

            return redirect()->intended()->with(['flash' => 'success', 'message' => 'Signed in!']);
        }

        return back()->withErrors(['email' => 'Your credentials could not be verified.']);
    }

    public function destroy()
    {
        // TODO: implement logout here
    }
}
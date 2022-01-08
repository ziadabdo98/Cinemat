<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function store()
    {
        $roles = Role::all()->collect();
        $fields = request()->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['max:255'],
            'username' => ['required', 'max:255', 'unique:App\Models\User,username'],
            'email' => ['required', 'email', 'max:255', 'unique:App\Models\User,email'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
            'role_id' => ['required', Rule::in($roles->whereNotIn('code', Role::ADMIN_CODE)->pluck('id'))],
        ]);

        // if user wants to be manager, set wants_manager to true
        if ($fields['role_id'] == $roles->where('code', Role::MANAGER_CODE)->first()['id']) {
            $fields['wants_manager'] = true;
        }

        // set role_id to customer always until admin confirms them
        $fields['role_id'] = $roles->where('code', Role::CUSTOMER_CODE)->first()['id'];

        $user = User::create($fields);

        // send mail to user
        Mail::to($user)->send(new WelcomeMail($user));

        // sign the user in
        auth()->login($user);

        // redirect user to home with flash message
        return redirect('/')->with([
            'flash' => 'success',
            'message' => $user->wants_manager ? 'Account created, you will remain customer until administration\'s approval.' : 'Your account has been successfully created!',
        ]);
    }

    public function dashboard()
    {
        // get the user with the reservations and shows for each reservation
        $user = User::with(['reservations.show.movie'])->find(auth()->id());
        return view('user.user-dashboard', [
            'user' => $user,
            'reservations' => $user->reservations->where('show.date', '>', Carbon::now()),
        ]);
    }
}

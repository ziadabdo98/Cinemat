<?php

namespace App\Http\Controllers;

use App\Models\Lead;

class LeadController extends Controller
{
    public function store()
    {
        Lead::create(request()->validate([
            'email' => ['required', 'email', 'max:255', 'unique:App\Models\Lead,email'],
        ]));

        return redirect('/')->with([
            'flash' => 'success',
            'message' => 'Thanks we\'ll notify you about new offers!',
        ]);
    }
}

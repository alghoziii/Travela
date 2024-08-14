<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileindexController extends Controller
{
    //

    public function show()
    {
        $user = auth()->user();
        return view('dashboard.profile', compact('user'));
    }
}

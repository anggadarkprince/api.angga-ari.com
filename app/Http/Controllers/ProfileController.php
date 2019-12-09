<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        $profile = $user->with([
            'profile.emails', 'profile.phones', 'profile.socials', 'profile.websites',
            'educations', 'experiences', 'skills.expertise', 'portfolios', 'achievements'
        ])->first();

        return response()->json($profile);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{

    /**
     * Get account profile.
     *
     * @param $username
     * @return JsonResponse
     */
    public function index($username)
    {
        $profile = User::where('username', $username)->with([
            'profile.emails', 'profile.phones', 'profile.socials', 'profile.websites',
            'educations', 'experiences', 'skills.expertise', 'portfolios', 'achievements'
        ])->firstOrFail();

        return response()->json($profile);
    }
}

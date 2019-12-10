<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;

class AchievementController extends Controller
{
    /**
     * Get achievement profile.
     *
     * @param $username
     * @return JsonResponse
     */
    public function index($username)
    {
        $achievements = User::where('username', $username)->firstOrFail()->profile->achievements;

        return response()->json($achievements);
    }
}

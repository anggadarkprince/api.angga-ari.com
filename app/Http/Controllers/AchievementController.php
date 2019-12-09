<?php

namespace App\Http\Controllers;

use App\User;

class AchievementController extends Controller
{
    public function index(User $user)
    {
        $achievements = $user->first()->profile->achievements;

        return response()->json($achievements);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    /**
     * Get experience profile.
     *
     * @param $username
     * @return JsonResponse
     */
    public function index($username)
    {
        $educations = User::where('username', $username)->first()->profile->experiences;

        return response()->json($educations);
    }
}

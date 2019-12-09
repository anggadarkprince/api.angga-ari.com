<?php

namespace App\Http\Controllers;

use App\User;

class ExperienceController extends Controller
{
    public function index(User $user)
    {
        $educations = $user->first()->profile->experiences;

        return response()->json($educations);
    }
}

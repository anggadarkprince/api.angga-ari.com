<?php

namespace App\Http\Controllers;

use App\User;

class EducationController extends Controller
{
    public function index(User $user)
    {
        $educations = $user->first()->profile->educations;

        return response()->json($educations);
    }
}

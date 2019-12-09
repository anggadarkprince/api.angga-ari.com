<?php

namespace App\Http\Controllers;

use App\User;

class SkillController extends Controller
{
    public function index(User $user)
    {
        $skills = $user->first()->profile->skills()->where('skill_id', null)->with('expertise')->get();

        if ($skills->isEmpty()) {
            $skills = $user->first()->profile->skills;
        }

        return response()->json($skills);
    }
}

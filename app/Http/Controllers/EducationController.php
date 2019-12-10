<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;

class EducationController extends Controller
{
    /**
     * Get profile education.
     *
     * @param $username
     * @return JsonResponse
     */
    public function index($username)
    {
        $educations = User::where('username', $username)->first()->profile->educations;

        return response()->json($educations);
    }
}

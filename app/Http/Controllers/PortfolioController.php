<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;

class PortfolioController extends Controller
{
    /**
     * Get portfolio profile.
     *
     * @param $username
     * @return JsonResponse
     */
    public function index($username)
    {
        $portfolios = User::where('username', $username)->first()->profile->porfolio;

        return response()->json($portfolios);
    }
}

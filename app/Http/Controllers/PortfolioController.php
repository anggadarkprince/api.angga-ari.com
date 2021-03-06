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
        $portfolios = User::where('username', $username)->firstOrFail()->profile->portfolios()->with('medias')->get();

        return response()->json($portfolios);
    }
}

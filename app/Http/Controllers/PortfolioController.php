<?php

namespace App\Http\Controllers;

use App\User;

class PortfolioController extends Controller
{
    public function index(User $user)
    {
        $portfolios = $user->first()->profile->porfolio;

        return response()->json($portfolios);
    }
}

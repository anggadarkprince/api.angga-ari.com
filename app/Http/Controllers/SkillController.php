<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class SkillController extends Controller
{
    /**
     * Get skill profile.
     *
     * @param $username
     * @return JsonResponse
     */
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        $skills = $user->profile->skills()->select(['skills.id', 'expertise AS group', 'description'])->where('is_group', true)->with('expertise')->get();

        if ($skills->isEmpty()) {
            $skills = $user->profile->skills;
            $isGrouped = 0;
        } else {
            $isGrouped = 1;
        }

        return response()->json([
            'is_grouped' => $isGrouped,
            'skills' => $skills
        ]);
    }
}

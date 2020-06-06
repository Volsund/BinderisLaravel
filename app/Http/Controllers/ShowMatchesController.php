<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowMatchesController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->id();

        $allMyLikes = DB::table('decisions')
            ->where('user_id', '=', $userId)
            ->where('decision_type', '=', 'like')
            ->get();

        $allWhoLikedMe = DB::table('decisions')
            ->where('decision_to', '=', $userId)
            ->where('decision_type', '=', 'like')
            ->get();

        $matches = $this->getMatches($allMyLikes, $allWhoLikedMe);

        $matchProfiles = $this->getMatchProfiles($matches);


        return view('matches', [
            'matches' => $matchProfiles
        ]);
    }

    private function getMatches($allMyLikes, $allWhoLikedMe)
    {
        $matches = [];
        foreach ($allMyLikes as $myLike) {
            foreach ($allWhoLikedMe as $likedMe) {
                if ($myLike->decision_to == $likedMe->user_id) {
                    $matches[] = $myLike;
                }
            }
        }
        return $matches;
    }

    private function getMatchProfiles($matches)
    {
        $profiles = [];

        $allProfiles = DB::table('profiles')->get();

        foreach ($allProfiles as $profile) {
            foreach ($matches as $match) {
                if (((int)$match->decision_to) === $profile->user_id) {
                    $profiles[] = $profile;
                }
            }
        }

        return $profiles;
    }
}

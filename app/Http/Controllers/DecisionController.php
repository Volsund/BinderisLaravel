<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function __invoke(Request $request)
    {
        return redirect()
            ->back();
    }

    public function likeUser(User $user)
    {
        /** @var User $authUser */
        $authUser = auth()->user();

        $authUser->decisions()->create([
            'decision_to' => $user->id,
            'decision_type' => 'like'
        ]);

        return redirect()->back();
    }

    public function dislikeUser(User $user)
    {
        /** @var User $authUser */
        $authUser = auth()->user();

        $authUser->decisions()->create([
            'decision_to' => $user->id,
            'decision_type' => 'dislike'
        ]);

        return redirect()->back();
    }


}

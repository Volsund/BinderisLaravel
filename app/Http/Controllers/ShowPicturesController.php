<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ShowPicturesController extends Controller
{
    public function __invoke(User $user)
    {
        $pictures = $user->pictures()->get();

        $profile = $user->profile()->first();

        return view('pictures', [
            'pictures' => $pictures,
            'user' => $user,
            'profile' => $profile
        ]);
    }
}

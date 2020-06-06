<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditUserProfileController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return view('profileEdit', [
            'user' => $user,
            'profile'=>$user->profile
        ]);
    }
}

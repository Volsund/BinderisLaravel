<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class matchingController extends Controller
{
    public function __invoke()
    {
        $profiles = Profile::withoutMe()->get();

        return view('matching',[
            'profiles'=>$profiles
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class UpdateUserProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->update([
            'name' => $request->get('name'),
        ]);

        if ($request->file('picture')) {
            Storage::delete($user->profile->profile_picture);
            $user->profile()->update([
                'full_name' => $request->get('full_name'),
                'surname' => $request->get('surname'),
                'profile_picture' => $request->file('picture')
                    ->store('public/profilePictures'),
                'location' => $request->get('location'),
                'sex' => $request->get('sex'),
                'age' => $request->get('age'),
                'min_age' => $request->get('min_age'),
                'max_age' => $request->get('max_age'),
                'gender_interest' => $request->get('gender_interest'),
                'description'=>$request->get('description')
            ]);
        } else {
            $user->profile()->update([
                'full_name' => $request->get('full_name'),
                'surname' => $request->get('surname'),
                'location' => $request->get('location'),
                'sex' => $request->get('sex'),
                'age' => $request->get('age'),
                'min_age' => $request->get('min_age'),
                'max_age' => $request->get('max_age'),
                'gender_interest' => $request->get('gender_interest'),
                'description'=>$request->get('description')

            ]);
        }

        return redirect()
            ->back()
            ->with('status', __('Profile has been updated!'));
    }


}

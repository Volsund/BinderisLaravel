<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class MatchingController extends Controller
{
    public function __invoke()
    {

        /** @var User @authUser */
        $authUser = auth()->user();
        $users = $authUser
            ->filterDecision()
            ->inRandomOrder()
            ->get();

        //todo need to figure these two out with local scopes.
        $ageFilteredUsers = $this->filterByAge($users);
        $genderFilteredUsers = $this->filterByGender($ageFilteredUsers);


        if (sizeof($genderFilteredUsers) > 0) {
            $user = $genderFilteredUsers[0];
            $profile = $user->profile()->first();
        }else{
            $user = 0;
            $profile = 0;
        }
        return view('matching', [
            'user' => $user,
            'profile' => $profile
        ]);
    }


    //todo how to type hint User collection??
    private function filterByAge($users): array
    {
        /** @var User @authUser */
        $authUser = auth()->user();
        $minAge = $authUser->profile()->first()->min_age;
        $maxAge = $authUser->profile()->first()->max_age;

        $ageFilteredUsers = [];

        foreach ($users as $user) {
            $userAge = (int)$user->profile()->first()->age;
            if (($userAge > $minAge) && $userAge < $maxAge) {
                $ageFilteredUsers[] = $user;
            }
        }
        return $ageFilteredUsers;
    }

    private function filterByGender($users): array
    {
        /** @var User @authUser */
        $authUser = auth()->user();
        $genderInterest = $authUser->profile()->first()->gender_interest;

        $genderFilteredUsers = [];

        foreach ($users as $user) {
            $userGender = $user->profile()->first()->sex;
            if ($userGender === $genderInterest) {
                $genderFilteredUsers[] = $user;
            }
        }

        return $genderFilteredUsers;
    }
}

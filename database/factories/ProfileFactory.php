<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Profile;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;


$factory->define(Profile::class, function (Faker $faker) {

    $allMenPictures = Storage::files('/public/pictures_man');
    $allWomanPictures = Storage::files('/public/pictures_woman');

    $num = rand(1, 0);
    if ($num === 1) {
        $sex = 'm';
        $name = $faker->firstNameMale;
        $allPictures = $allMenPictures;
        $genderInterest = 'f';
    } else {
        $sex = 'f';
        $name = $faker->firstNameFemale;
        $allPictures = $allWomanPictures;
        $genderInterest = 'm';
    }
    $whatPicture = $allPictures[rand(0, count($allPictures) - 1)];
    $lowerAge = rand(18, 90);
    $upperAge = rand($lowerAge, 90);

    return [
        'profile_picture' => $whatPicture,
        'full_name' => $name,
        'surname' => $faker->lastName,
        'age' => rand(18, 90),
        'sex' => $sex,
        'location' => $faker->city,
        'min_age' => $lowerAge,
        'max_age' => $upperAge,
        'gender_interest' => $genderInterest,
        'description' => $faker->text(140)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Decision;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Decision::class, function (Faker $faker) {

    return [
        'decision_to'=>rand(1,101),
        'decision_type'=>$faker->randomElement(['like','dislike'])
    ];
});

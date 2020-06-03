<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'location'=>'https://loremflickr.com/300/380/'
    ];
});

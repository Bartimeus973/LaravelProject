<?php

use Faker\Generator as Faker;

//Generate a data with the library Faker
$factory->define(App\Avatar::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail, //Generate a random email
        'picture' => $faker->imageURL, //Generate a random url image
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Avatar::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'picture' => $faker->imageURL,
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(\App\Option::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'is_correct' => $faker->randomElement([0, 1]),
    ];
});

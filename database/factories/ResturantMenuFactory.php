<?php

use Faker\Generator as Faker;

$factory->define(App\ResturantMenu::class, function (Faker $faker) {
    return [
        'version' => $faker->text(30),
        'created_by' => $faker->randomDigit,
        'updated_by' => $faker->randomDigit
    ];
});

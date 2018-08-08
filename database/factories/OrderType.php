<?php

use Faker\Generator as Faker;

$factory->define(App\OrderType::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30)
    ];
});

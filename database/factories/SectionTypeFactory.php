<?php

use Faker\Generator as Faker;

$factory->define(App\SectionType::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'enabled' => $faker->numberBetween(0, 1),
        'created_by' => $faker->randomDigit,
        'updated_by' => $faker->randomDigit
    ];
});

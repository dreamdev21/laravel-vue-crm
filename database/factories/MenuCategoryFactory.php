<?php

use Faker\Generator as Faker;

$factory->define(App\MenuCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'resturant_menu_id' => $faker->randomDigit,
        'enabled' => $faker->numberBetween(0, 1),
        'created_by' => $faker->randomDigit,
        'updated_by' => $faker->randomDigit
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\MenuItem::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'description' => $faker->text(30),
        'price' => $faker->randomFloat(2, 0, 999999),
        'menu_category_id' => $faker->randomDigit,
        'enabled' => $faker->numberBetween(0, 1),
        'created_by' => $faker->randomDigit,
        'updated_by' => $faker->randomDigit
    ];
});

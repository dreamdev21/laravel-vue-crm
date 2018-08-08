<?php

use Faker\Generator as Faker;

$factory->define(App\OrderDetail::class, function (Faker $faker) {
    return [
        'quantity' => $faker->randomDigit,
        'amount' => $faker->randomFloat(2, 0, 999999),
        'menu_item_id' => $faker->randomDigit,
        'order_id' => $faker->randomDigit,
        'enabled' => $faker->numberBetween(0, 1),
        'created_by' => $faker->randomDigit,
        'updated_by' => $faker->randomDigit
    ];
});

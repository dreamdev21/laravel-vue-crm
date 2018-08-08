<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'reservation_date' => $faker->dateTime(),
        'customer_id' => $faker->randomDigit,
        'dining_table_id' => $faker->randomDigit,
        'enabled' => $faker->numberBetween(0, 1),
        'created_by' => $faker->randomDigit,
        'updated_by' => $faker->randomDigit
    ];
});

<?php

use Illuminate\Database\Seeder;

class OrderType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\OrderType::class,30)->create();
    }
}

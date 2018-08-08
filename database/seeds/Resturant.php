<?php

use Illuminate\Database\Seeder;

class Resturant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Resturant::class,30)->create();
    }
}

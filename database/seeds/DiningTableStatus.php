<?php

use Illuminate\Database\Seeder;

class DiningTableStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DiningTableStatus::class,30)->create();
    }
}

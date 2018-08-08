<?php

use Illuminate\Database\Seeder;

class ResturantMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ResturantMenu::class,30)->create(); 
    }
}

<?php

use Illuminate\Database\Seeder;

class MenuItem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MenuItem::class,30)->create(); 
    }
}

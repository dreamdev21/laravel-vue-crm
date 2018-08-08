<?php

use Illuminate\Database\Seeder;

class MenuCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MenuCategory::class,30)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class SectionType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SectionType::class,30)->create();
    }
}

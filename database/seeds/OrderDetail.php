<?php

use Illuminate\Database\Seeder;

class OrderDetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\OrderDetail::class,30)->create(); 
    }
}

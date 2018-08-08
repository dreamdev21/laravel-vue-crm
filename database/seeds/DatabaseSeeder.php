<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(OrderType::class);
        $this->call(ResturantMenu::class);
        $this->call(MenuCategory::class);
        $this->call(DiningTableStatus::class);
        $this->call(Resturant::class);
        $this->call(MenuItem::class);
        $this->call(Customer::class);
        $this->call(OrderDetail::class);
        $this->call(Reservation::class);
        //$this->call(SectionType::class);
    }
}

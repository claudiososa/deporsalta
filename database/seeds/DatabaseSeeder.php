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
        factory(App\User::class,1)->create();
        // $this->call(UsersTableSeeder::class);
        factory(App\Category::class)
        ->times(20)
        ->create();

        factory(App\Brand::class)
        ->times(20)
        ->create();

        factory(App\Colour::class)
        ->times(20)
        ->create();

        factory(App\Product::class)
        ->times(200)
        ->create();

        factory(App\Waist::class)
        ->times(20)
        ->create();

        factory(App\Quantity::class)
        ->times(1)
        ->create();

        factory(App\Sale::class)
        ->times(1)
        ->create();

        factory(App\Payment::class)
        ->times(1)
        ->create();

        factory(App\Refund::class)
        ->times(2)
        ->create();

        factory(App\SaleDetail::class)
        ->times(3)
        ->create();

        /*factory(App\Image::class)
        ->times(1)
        ->create();*/


    }
}

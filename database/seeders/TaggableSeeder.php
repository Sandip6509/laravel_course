<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaggableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::get();
        $cars = Car::get();

        foreach ($customers as $key => $customer) {
            $tag = Tag::get()->random()->first();
            $customer->tags()->save($tag);
        }

        foreach ($cars as $key => $car) {
            $tag = Tag::get()->random()->first();
            $car->tags()->save($tag);
        }
    }
}

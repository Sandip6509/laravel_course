<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dealer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Car::factory(50)->create();
        // \App\Models\Customer::factory(50)->create();
        // \App\Models\Image::factory(50)->create();
        // \App\Models\Tag::factory(10)->create();
        \App\Models\User::factory(100)->create();
        // $this->call([
            // TaggableSeeder::class
        //     BrandSeeder::class,
        //     DealerSeeder::class
        // ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++){
            Brand::create([
                'name' => 'Brand Name '.$i,
                'description' => 'Brand Description '.$i
            ]);
        }
    }
}

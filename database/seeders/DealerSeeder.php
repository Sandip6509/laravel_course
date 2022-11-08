<?php

namespace Database\Seeders;

use App\Models\Dealer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++){
            Dealer::create([
                'brand_id' => $i,
                'name' => 'Brand Name '.$i,
                'description' => 'Brand Description '.$i,
                'location' => 'Dealer location '.$i
            ]);
        }
    }
}
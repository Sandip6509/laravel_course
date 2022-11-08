<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Octavia',
            'product' => 'skoda',
            'description'=> 'sedan car',
            'launched_at'=> '2022-10-21 15:25:56',
            'price' => '250000',
            'created_at'=> '2022-10-21 15:25:56',
            'updated_at'=> '2022-10-21 15:25:56',
        ];

        DB::table('cars')->insert($data);
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Model-1','Model-2','Model-3','Model-4','Model-5']),
            'brand'=> $this->faker->randomElement(['skoda','BMW','Mercades','Cadillac','Masrati'])
        ];
    }
}

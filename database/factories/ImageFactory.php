<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => $this->faker->imageUrl($width = 640, $height=480),
            'imagable_id' => $this->faker->numberBetween(1,20),
            'imagable_type' => $this->faker->randomElement([Car::class,Customer::class])
        ];
    }
}

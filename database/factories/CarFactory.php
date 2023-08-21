<?php

namespace Database\Factories;

use App\Models\Mechanic;
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
    public function definition(): array
    {
        return [
            'model' => fake()->word . ' ' . fake()->randomElement(['Sedan', 'SUV', 'Coupe']),
            'mechanic_id' => function () {
                return Mechanic::factory()->create()->id;
            },
        ];
    }
}

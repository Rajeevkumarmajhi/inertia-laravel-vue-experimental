<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
    public function definition(): array
    {
        $imageableType = fake()->randomElement([Post::class, User::class]);
        return [
            'url' => fake()->imageUrl(),
            'imageable_id' => $imageableType::factory(),
            'imageable_type' => $imageableType,
        ];
    }
}

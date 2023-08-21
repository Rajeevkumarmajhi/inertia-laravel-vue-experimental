<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => fake()->paragraph,
            'commentable_id' => function () {
                // Randomly select a Post or Video ID
                return fake()->randomElement([Post::pluck('id')->random(), Video::pluck('id')->random()]);
            },
            'commentable_type' => function (array $attributes) {
                // Determine the commentable type based on the generated commentable_id
                return $attributes['commentable_id'] instanceof Post ? Post::class : Video::class;
            },
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3,true),
            'body' => fake()->paragraphs(2,true),
            'user_id' => User::all()->random()->id,
            'post_status_id' => PostStatus::all()->random()->id,
        ];
    }
}

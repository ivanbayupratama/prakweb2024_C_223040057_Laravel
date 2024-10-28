<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timeline>
 */
class TimelineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->uuid(),
            'judul' => fake()->text(mt_rand(5, 15)),
            'content' => fake()->imageUrl(720, 1280, 'nature'),
            'is_video' => false,
            'author_id' => mt_rand(1, 4),
            'music_id' => "1",
        ];
    }
}

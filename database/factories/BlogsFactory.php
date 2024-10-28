<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $array1 = array(
        //     "9b95f178-03c7-4e0b-8dbb-746fc16ad241",
        //     "9b95f1fe-91c6-4b2d-a18c-e94c2a8c7a97"
        // );
        return [
            'uuid' => fake()->uuid(),
            'cover' => fake()->imageUrl(1280, 720),
            'title' => $this->faker->sentence(mt_rand(2, 10)),
            'slug' => $this->faker->slug(),
            'article' => $this->faker->paragraph(mt_rand(10, 20)),
            'author_id' => mt_rand(1, 5),
        ];
    }
}

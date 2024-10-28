<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $comment = fake()->realText(mt_rand(10, 20));
        $array = array('blog-1', 'tmln-1');
        $content = array_rand($array);
        return [
            'hash_id' => hash('sha256', $content . $comment),
            'comment' => $comment,
            'user_id' => mt_rand(1, 10),
        ];
    }
}

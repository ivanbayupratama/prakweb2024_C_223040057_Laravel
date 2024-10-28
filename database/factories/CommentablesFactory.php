<?php

namespace Database\Factories;

// use App\Models\User;
use App\Models\Blogs;
use App\Models\Timeline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentables>
 */
class CommentablesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $noteable = fake()->randomElement([
            Blogs::class,
            Timeline::class,

        ]);
        return [
            'comment_id' => mt_rand(1, 4),
            'commentable_type' => $noteable,
            'commentable_id' => 1,
        ];
    }
}

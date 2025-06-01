<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [

            'title'=>fake()->title(20),

            'content'=>fake()->text(30),

            'image'=>fake()->imageUrl(),

            'likes'=>random_int(1,200),

            'is_published'=>1,

            'category_id'=>Category::get()->random()->id,

        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(200)->create();
        $posts = Post::factory(200)->create();
        $tags = Tag::factory(5)->create();

        foreach ($posts as $post) {
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIds);
        }
    }
}

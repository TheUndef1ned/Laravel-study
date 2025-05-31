<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke() {
        $data = request()->validate([
            "title" => 'string',
            "content" => 'string',
            "image" => 'string',
            "category_id" => '',
            'tags' => 'nullable|array',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

/**
 * Controller for handling post editing.
 */
class EditController extends Controller
{
    /**
     * Display the post editing form.
     *
     * @param Post $post The post to be edited.
     * @return View
     */
    public function __invoke(Post $post): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }
}

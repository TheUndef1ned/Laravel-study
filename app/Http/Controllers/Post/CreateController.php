<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

/**
 * Controller for handling post creation.
 */
class CreateController extends Controller
{
    /**
     * Display the post creation form.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }
}

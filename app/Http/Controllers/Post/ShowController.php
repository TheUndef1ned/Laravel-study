<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;

/**
 * Controller for handling post display.
 */
class ShowController extends Controller
{
    /**
     * Display the specified post.
     *
     * @param Post $post The post to be displayed.
     * @return View
     */
    public function __invoke(Post $post): View
    {
        return view('post.show', compact('post'));
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 * Controller for handling post deletion.
 */
class DeleteController extends Controller
{
    /**
     * Delete the specified post and redirect to the post index.
     *
     * @param Post $post The post to be deleted.
     * @return RedirectResponse
     */
    public function __invoke(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 * Controller for handling post updates.
 */
class UpdateController extends Controller
{
    /**
     * Update the specified post and redirect to the post show page.
     *
     * @param UpdateRequest $request The validated update request.
     * @param Post $post The post to be updated.
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}

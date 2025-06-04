<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Controller for handling post-related actions.
 */
class PostController extends Controller
{
    /**
     * Display a listing of posts.
     *
     * @return View
     */
    public function index(): View
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created post in storage.
     *
     * @param Request $request The request containing the post data.
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'nullable',
            'tags' => 'nullable|array',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified post.
     *
     * @param Post $post The post to be displayed.
     * @return View
     */
    public function show(Post $post): View
    {
        return view('post.show', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param Request $request The request containing the updated post data.
     * @param Post $post The post to be updated.
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'nullable',
            'tags' => 'nullable|array',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param Post $post The post to be edited.
     * @return View
     */
    public function edit(Post $post): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Remove the specified post from storage.
     *
     * @param Post $post The post to be deleted.
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}

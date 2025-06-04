<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

/**
 * Controller for handling the about page.
 */
class AboutController extends Controller
{
    /**
     * Display the about page.
     *
     * @return View
     */
    public function index(): View
    {
        $universities = Post::all();

        return view('about');
    }
}

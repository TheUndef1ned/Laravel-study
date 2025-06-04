<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

/**
 * Controller for handling the main page.
 */
class MainController extends Controller
{
    /**
     * Display the main page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('main');
    }
}

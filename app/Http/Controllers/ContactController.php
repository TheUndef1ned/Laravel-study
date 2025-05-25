<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ContactController extends Controller
{
    public function index()
    {
        $universities = Post::all();

        return view('contacts');
    }

}

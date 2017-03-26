<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Show the index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('home')->withPosts($posts);
    }
}

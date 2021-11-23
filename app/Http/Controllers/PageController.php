<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view("guest.vuejs", compact('posts'));
    }

    public function apiPosts()
    {
        $posts = Post::all();

        return view("guest.index", compact('posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;

class WebController extends Controller
{
    protected $categories, $tags, $posts;

    public function __construct()
    {
        $this->posts = Post::isPublish()->with(['user'])->latest();
        $this->categories = Category::withCount('posts')->latest()->get(['slug','name'])->take(10);
        $this->tags = Tag::oldest('name')->get(['slug','name']);
    }
}

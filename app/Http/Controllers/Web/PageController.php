<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->posts = Post::isPublish()->with('user')->latest();
        $this->categories = Category::withCount('posts')->latest()->get(['slug','name'])->take(10);
        $this->tags = Tag::oldest('name')->get(['slug','name']);
    }
    public function blog(){
        return view('web.posts', ['posts' => $this->posts->paginate(3), 'categories'=>$this->categories,'tags'=>$this->tags]);
    }

    public function category($slug){
        $categoryID = Category::findIdSlug($slug);
        return view('web.posts', ['posts' => $this->posts->where('category_id', $categoryID)->paginate(3),'categories'=>$this->categories,'tags'=>$this->tags]);
    }

    public function tag($slug){
        $posts = $this->posts
                    ->whereHas('tags', function($query) use ($slug) {
                        $query->where('slug', $slug);
                    })
                    ->paginate(3);
        return view('web.posts', ['posts'=>$posts, 'categories'=>$this->categories,'tags'=>$this->tags]);
    }

    public function post($slug)
    {
        return view('web.post', ['post' => Post::with('category','tags')->findSlug($slug), 'categories'=>$this->categories,'tags'=>$this->tags ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::oldest('name')->get(['name','id']);
        $tags = Tag::oldest('name')->get();

        return view('admin.posts.create', compact('categories','tags'));
    }

    public function store(PostStoreRequest $request)
    {
        $inputs = $request->all();
        $post = Post::create($inputs);

        // IMAGE
        if($request->file('file')){
            $path = Storage::disk('image')->put('img/posts-images', $request->file('file'));
            $post->file = $path;
            $post->save();
        }
        // TAGS
        $post->tags()->attach($inputs['tags']);
        
        return redirect()->route('posts.index')->withSuccess('Entrada creada correctamente');
    }

    public function show(Post $post)
    {
        $this->authorize('pass', $post);
        $post->load('user','category','tags');
        return view('admin.posts.show',compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('pass', $post);

        $categories = Category::oldest('name')->get(['name','id']);
        $tags = Tag::oldest('name')->get();
        $post->load('tags');
        
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $inputs = $request->all();
        $post->update($inputs);

        // IMAGE
        if($request->file('file')){
            $path = Storage::disk('image')->put('img/posts-images', $request->file('file'));
            $post->file = $path;
            $post->save();
        }
        // TAGS
        $post->tags()->sync($inputs['tags']);

        return redirect()->route('posts.index')->withSuccess('Entrada actualizada correctamente');
    }

    public function destroy(Post $post)
    {
        $this->authorize('pass', $post);
        
        $post->delete();

        return back()->withSuccess('La entrada fue eliminada correctamente');
    }
}

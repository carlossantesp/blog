<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Category;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    protected $categories, $tags;

    public function __construct()
    {
        $this->categories = Category::oldest('name')->pluck('name', 'id');
        $this->tags = Tag::oldest('name')->get(['id','name']);
    }

    public function index()
    {
        $posts = request()->user()->posts()->with(['category'])->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories'=>$this->categories,
            'tags'=>$this->tags,
            'post' => new Post
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        $post = new Post($request->all());

        if($request->hasFile('file'))
            $post->file = $request->file('file')->store('posts-images');

        $post->save();

        $post->syncTags($request->tags);

        return redirect()->route('posts.index')->withSuccess('Entrada creada correctamente');
    }

    public function show(Post $post)
    {
        $this->authorize('pass', $post);

        return view('admin.posts.show',[
            'post'=>$post->load('user','category','tags')
        ]);
    }

    public function edit(Post $post)
    {
        $this->authorize('pass', $post);

        return view('admin.posts.edit', [
            'categories'=>$this->categories,
            'tags'=>$this->tags,
            'post' => $post->load('tags')
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->fill($request->all());

        if($request->hasFile('file')){
            Storage::delete($post->file);
            $post->file = $request->file('file')->store('posts-images');
        }

        $post->save();

        $post->syncTags($request->tags);

        return redirect()->route('posts.index')->withSuccess('Entrada actualizada correctamente');
    }

    public function destroy(Post $post)
    {
        $this->authorize('pass', $post);

        Storage::delete($post->file);

        $post->delete();

        return back()->withSuccess('La entrada fue eliminada correctamente');
    }
}

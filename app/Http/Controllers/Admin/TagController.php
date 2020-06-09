<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Tag;

class TagController extends Controller
{

    public function __construct(Tag $tag)
    {
        $this->middleware('auth');
        $this->tag = $tag;
    }

    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create', ['tag' => new Tag]);
    }

    public function store(TagStoreRequest $request)
    {
        $inputs = $request->all();
        $this->tag->create($inputs);
        
        return redirect()->route('tags.index')->withSuccess('Etiqueta creada correctamente');
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $inputs = $request->all();
        $tag->update($inputs);

        return redirect()->route('tags.index')->withSuccess('Etiqueta actualizada correctamente');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->withSuccess('La etiqueta fue eliminada correctamente');
    }
}

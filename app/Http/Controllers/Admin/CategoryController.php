<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Category;

// use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(Category $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }

    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $inputs = $request->all();
        $this->category->create($inputs);
        
        return redirect()->route('categories.index')->withSuccess('Categoria creada correctamente');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $inputs = $request->all();
        $category->update($inputs);

        return redirect()->route('categories.index')->withSuccess('Categoria actualizada correctamente');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->withSuccess('La categoria fue eliminada correctamente');
    }
}

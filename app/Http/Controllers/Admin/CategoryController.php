<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create',['category' => new Category]);
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->all());

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
        $category->update($request->all());

        return redirect()->route('categories.index')->withSuccess('Categoria actualizada correctamente');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->withSuccess('La categoria fue eliminada correctamente');
    }
}

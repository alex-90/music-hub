<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Category::all();

        return view('category.index', ['models' => $models]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all = Category::all()->pluck('name', 'id');

        return view('category.create', ['all' => $all]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $name = $request->input('name');
        $parent_id = $request->input('parent_id');

        $model = new Category;
        $model->name = $name;
        $model->parent_id = $parent_id;
        $model->save();

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $all = Category::all()->pluck('name', 'id');

        return view('category.update', ['model' => $category, 'all' => $all]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $name = $request->input('name');
        $parent_id = $request->input('parent_id');

        $category->name = $name;
        $category->parent_id = $parent_id;
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}

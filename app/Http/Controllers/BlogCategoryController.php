<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
{
    $categories = BlogCategory::latest()->paginate(10); // use paginate for ->links()
    return view('admin.blog_categories.index', compact('categories')); // $categories
}


    public function create()
    {
        return view('admin.blog_categories.create');
    }

    public function store(Request $request)
    {
$request->validate([
    'category' => 'required|string|max:255'
]);

BlogCategory::create([
    'category' => $request->category
]);


        return redirect()->route('admin.blog_categories.index')
                         ->with('success', 'Category added successfully.');
    }

    public function show(BlogCategory $blogCategory)
{
    return view('admin.blog_categories.show', compact('blogCategory'));
}

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog_categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
{
    $request->validate([
        'category' => 'required|string|max:255'
    ]);

    $blogCategory->update([
        'category' => $request->category
    ]);

    return redirect()->route('admin.blog_categories.index')
                     ->with('success', 'Category updated successfully.');
}

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('admin.blog_categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}

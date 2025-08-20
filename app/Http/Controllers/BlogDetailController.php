<?php

namespace App\Http\Controllers;

use App\Models\BlogDetail;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogDetailController extends Controller
{
    public function index()
    {
        // dd('This is the blog detail index method. You can customize it as needed.');
        $blogs = BlogDetail::latest()->paginate(10);

        return view('admin.blogs_details.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('category')->get();
        return view('admin.blogs_details.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category'    => 'required|string|exists:blog_categories,category',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs_details', 'public');
        }

        $validated['categories'] = !empty($validated['category']) ? json_encode([$validated['category']]) : null;
        unset($validated['category']);

        BlogDetail::create($validated);

        return redirect()->route('admin.blogs_details.index')->with('success', 'Blog created successfully!');
    }

    public function show(BlogDetail $blogs_detail)
    {
        $categories = json_decode($blogs_detail->categories, true) ?: [];
        return view('admin.blogs_details.show', compact('blogs_detail', 'categories'));
    }

    public function edit(BlogDetail $blogs_detail)
    {
        $categories = BlogCategory::all();
        $selectedCategory = $blogs_detail->categories ? json_decode($blogs_detail->categories, true)[0] ?? null : null;
        return view('admin.blogs_details.edit', compact('blogs_detail', 'categories', 'selectedCategory'));
    }

    public function update(Request $request, BlogDetail $blogs_detail)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category'    => 'required|string|exists:blog_categories,category',
        ]);

        if ($request->hasFile('image') && $blogs_detail->image) {
            Storage::disk('public')->delete($blogs_detail->image);
            $validated['image'] = $request->file('image')->store('blogs_details', 'public');
        }

        $validated['categories'] = !empty($validated['category']) ? json_encode([$validated['category']]) : null;
        unset($validated['category']);

        $blogs_detail->update($validated);

        return redirect()->route('admin.blogs_details.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy(BlogDetail $blogs_detail)
    {
        if ($blogs_detail->image) {
            Storage::disk('public')->delete($blogs_detail->image);
        }
        $blogs_detail->delete();

        return redirect()->route('admin.blogs_details.index')->with('success', 'Blog deleted successfully!');
    }
}

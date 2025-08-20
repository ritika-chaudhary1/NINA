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
        // Convert comma-separated string to array if categories is present
        if ($request->has('categories') && is_string($request->categories)) {
            $categoriesArray = array_filter(array_map('trim', explode(',', $request->categories)));
            $request->merge(['categories' => $categoriesArray]);
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required|string|exists:blog_categories,category',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs_details', 'public');
        }

        if (!empty($validated['category'])) {
            // Store single category as JSON
            $validated['categories'] = json_encode([$validated['category']]);
        } else {
            $validated['categories'] = null;
        }

        BlogDetails::create($validated);

        return redirect()->route('admin.blogs_details.index')->with('success', 'Blog created successfully!');
    }

    public function show(BlogDetail $blogs_detail)
    {
        // Decode JSON categories to array, or empty array if null
        $categories = json_decode($blogs_detail->categories, true) ?: [];

        return view('admin.blogs_details.show', compact('blogs_detail', 'categories'));
    }

    public function edit(BlogDetail $blogs_detail)
    {
        $categories = BlogCategory::all();

        // Decode categories JSON, pick first or null
        $selectedCategory = null;
        if ($blogs_detail->categories) {
            $decoded = json_decode($blogs_detail->categories, true);
            $selectedCategory = is_array($decoded) && count($decoded) > 0 ? $decoded[0] : null;
        }

        return view('admin.blogs_details.edit', compact('blogs_detail', 'categories', 'selectedCategory'));
    }

    public function update(Request $request, BlogDetail $blogs_detail)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required|string|exists:blog_categories,category',
        ]);

        if ($request->hasFile('image')) {
            if ($blogs_detail->image) {
                Storage::disk('public')->delete($blogs_detail->image);
            }
            $validated['image'] = $request->file('image')->store('blogs_details', 'public');
        }

        // Save category as JSON
        if (!empty($validated['category'])) {
            $validated['categories'] = json_encode([$validated['category']]);
        } else {
            $validated['categories'] = null;
        }

        unset($validated['category']); // remove 'category' key

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

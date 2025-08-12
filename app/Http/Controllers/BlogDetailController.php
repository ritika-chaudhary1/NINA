<?php

namespace App\Http\Controllers;

use App\Models\BlogDetail;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BlogDetailController extends Controller
{
    public function index()
    {
        $blogs = BlogDetail::latest()->paginate(10);
        return view('admin.blogs_details.index', compact('blogs'));
    }

    public function create()
{
    // Fetch categories of type 'blog' (optional)
    $categories = Category::where('type', 'blog')->orderBy('name')->get();
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
    'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'category'    => 'required|string|exists:categories,name',
]);


        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs_details', 'public');
        }

        if (!empty($validated['category'])) {
    // if using single category:
    $validated['categories'] = json_encode([$validated['category']]);
} else {
    $validated['categories'] = null;
}

        BlogDetail::create($validated);

        return redirect()->route('admin.blogs_details.index')->with('success', 'Blog created successfully!');
    }

   public function show(BlogDetail $blogs_detail)
{
    // Decode JSON categories to array, or empty array if null
    $categories = json_decode($blogs_detail->categories, true) ?: [];

    // Pass both blog detail and categories to the view
    return view('admin.blogs_details.show', compact('blogs_detail', 'categories'));
}


   public function edit(BlogDetail $blogs_detail)
{
    $categories = Category::all();

    // Decode categories JSON (array), pick first or null
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
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category'    => 'required|string|exists:categories,name',
    ]);

    if ($request->hasFile('image')) {
        if ($blogs_detail->image) {
            Storage::disk('public')->delete($blogs_detail->image);
        }
        $validated['image'] = $request->file('image')->store('blogs_details', 'public');
    }

    // Save 'categories' field as JSON encoded single category (array with one element)
    if (!empty($validated['category'])) {
        $validated['categories'] = json_encode([$validated['category']]);
    } else {
        $validated['categories'] = null;
    }

    // Remove 'category' key as we use 'categories' in DB
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

<?php

namespace App\Http\Controllers;

use App\Models\PortfolioDetail;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioDetailController extends Controller
{
    public function index()
    {
        $portfolio_details = PortfolioDetail::latest()->paginate(10);
        return view('admin.portfolio_details.index', compact('portfolio_details'));
    }

    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio_details.create', compact('categories'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'subtitle'    => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'optional_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'portfolio_category_id' => 'nullable|exists:portfolio_categories,id',
        'client'      => 'nullable|string|max:255',
        'location'    => 'nullable|string|max:255',
        'extra_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    ]);

    // Store main image if uploaded
    $mainImage = null;
    if ($request->hasFile('image')) {
        $mainImage = $request->file('image')->store('portfolio_images', 'public');
        $validated['image'] = $mainImage;
    }

    // Store optional image if uploaded
    if ($request->hasFile('optional_image')) {
        $validated['optional_image'] = $request->file('optional_image')->store('portfolio_images', 'public');
    }

    // Handle extra images
    $extraImages = [];
    if ($request->hasFile('extra_images')) {
        foreach ($request->file('extra_images') as $index => $file) {
            $path = $file->store('portfolios', 'public');
            $extraImages[] = $path;
        }
        // If no main image uploaded, use the first extra image
        if (empty($mainImage) && count($extraImages) > 0) {
            $validated['image'] = $extraImages[0];
        }
    }

    // Ensure extra_images is always saved as a JSON array
    $validated['extra_images'] = $extraImages;
    $portfolio = PortfolioDetail::create($validated);

    return redirect()->route('admin.portfolio_details.index')
                     ->with('success', 'Portfolio detail created successfully.');
}


    public function show(PortfolioDetail $portfolio_detail)
    {
        return view('admin.portfolio_details.show', compact('portfolio_detail'));
    }

    public function edit(PortfolioDetail $portfolio_detail)
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio_details.edit', compact('portfolio_detail', 'categories'));
    }

public function update(Request $request, PortfolioDetail $portfolio_detail)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'subtitle'    => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'optional_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'portfolio_category_id' => 'nullable|exists:portfolio_categories,id',
        'client'      => 'nullable|string|max:255',
        'location'    => 'nullable|string|max:255',
        'extra_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    ]);

    // Update main image if uploaded
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('portfolio_images', 'public');
    }

    // Update optional image if uploaded
    if ($request->hasFile('optional_image')) {
        $validated['optional_image'] = $request->file('optional_image')->store('portfolio_images', 'public');
    }

    // Update main fields
    $portfolio_detail->update($validated);

    // Handle extra images
    if ($request->hasFile('extra_images')) {
        $extraImages = $portfolio_detail->extra_images ?? []; // keep old extra images

        foreach ($request->file('extra_images') as $index => $file) {
            $path = $file->store('portfolios', 'public');
            $extraImages[] = $path;

            // Update main image if not already set
            if ($index === 0 && empty($portfolio_detail->image)) {
                $portfolio_detail->image = $path;
            }
        }

        $portfolio_detail->extra_images = $extraImages;
        $portfolio_detail->save();
    }

    return redirect()->route('admin.portfolio_details.index')
                     ->with('success', 'Portfolio detail updated successfully.');
}

    public function destroy(PortfolioDetail $portfolio_detail)
    {
        // Delete main image
        if ($portfolio_detail->image) {
            Storage::disk('public')->delete($portfolio_detail->image);
        }

        // Delete extra images
        if ($portfolio_detail->extra_images) {
    $extraImages = is_array($portfolio_detail->extra_images) 
        ? $portfolio_detail->extra_images 
        : json_decode($portfolio_detail->extra_images, true);

    if ($extraImages) {
        foreach ($extraImages as $img) {
            Storage::disk('public')->delete($img);
        }
    }
}

        $portfolio_detail->delete();

        return redirect()->route('admin.portfolio_details.index')
                         ->with('success', 'Portfolio detail deleted successfully.');
    }
}

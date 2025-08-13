<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolios.
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio.
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created portfolio in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio_images', 'public');
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio created successfully.');
    }

    /**
     * Display the specified portfolio.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified portfolio.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified portfolio in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolio_images', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified portfolio from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio deleted successfully.');
    }
}

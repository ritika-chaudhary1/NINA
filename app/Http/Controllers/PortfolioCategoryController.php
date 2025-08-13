<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the portfolio categories.
     */
    public function index()
    {
        $categories = PortfolioCategory::latest()->paginate(10);
        return view('admin.portfolio_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new portfolio category.
     */
    public function create()
    {
        return view('admin.portfolio_categories.create');
    }

    /**
     * Store a newly created portfolio category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:portfolio_categories,category_name',
        ]);

        PortfolioCategory::create([
            'category_name' => $request->category_name
        ]);

        return redirect()->route('admin.portfolio_categories.index')
            ->with('success', 'Portfolio Category created successfully.');
    }

    /**
     * Display the specified portfolio category.
     */
    public function show(PortfolioCategory $portfolio_category)
{
    return view('admin.portfolio_categories.show', compact('portfolio_category'));
}

    /**
     * Show the form for editing the specified portfolio category.
     */
    public function edit($id)
{
    $portfolio_category = PortfolioCategory::findOrFail($id);
    return view('admin.portfolio_categories.edit', compact('portfolio_category'));
}

    /**
     * Update the specified portfolio category in storage.
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:portfolio_categories,category_name,' . $portfolioCategory->id,
        ]);

        $portfolioCategory->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->route('admin.portfolio_categories.index')
            ->with('success', 'Portfolio Category updated successfully.');
    }

    /**
     * Remove the specified portfolio category from storage.
     */
    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->delete();

        return redirect()->route('admin.portfolio_categories.index')
            ->with('success', 'Portfolio Category deleted successfully.');
    }
}

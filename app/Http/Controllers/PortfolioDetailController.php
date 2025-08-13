<?php

namespace App\Http\Controllers;

use App\Models\PortfolioDetail;
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
        return view('admin.portfolio_details.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio_images', 'public');
        }

        PortfolioDetail::create($validated);

        return redirect()->route('admin.portfolio_details.index')->with('success', 'Portfolio detail created successfully.');
    }

    public function show(PortfolioDetail $portfolio_detail)
    {
        return view('admin.portfolio_details.show', compact('portfolio_detail'));
    }

    public function edit(PortfolioDetail $portfolio_detail)
    {
        return view('admin.portfolio_details.edit', compact('portfolio_detail'));
    }

    public function update(Request $request, PortfolioDetail $portfolio_detail)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio_detail->image) {
                Storage::disk('public')->delete($portfolio_detail->image);
            }
            $validated['image'] = $request->file('image')->store('portfolio_images', 'public');
        }

        $portfolio_detail->update($validated);

        return redirect()->route('admin.portfolio_details.index')->with('success', 'Portfolio detail updated successfully.');
    }

    public function destroy(PortfolioDetail $portfolio_detail)
    {
        if ($portfolio_detail->image) {
            Storage::disk('public')->delete($portfolio_detail->image);
        }

        $portfolio_detail->delete();

        return redirect()->route('admin.portfolio_details.index')->with('success', 'Portfolio detail deleted successfully.');
    }
}

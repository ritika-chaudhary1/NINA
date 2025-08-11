<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\ServiceDetail;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
   /**
     * Display a listing of the service details (optionally filtered by service).
     */
    public function index(Request $request)
    {
        if ($request->has('service_id')) {
            $service = Service::findOrFail($request->service_id);
            $details = $service->details()->orderBy('order')->get();
        } else {
            $details = ServiceDetail::orderBy('order')->get();
        }

        return view('service_details.index', compact('details'));
    }

    /**
     * Show the form for creating a new service detail.
     */
    public function create()
    {
        $services = Service::all();
        return view('service_details.create', compact('services'));
    }

    /**
     * Store a newly created service detail in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'heading'    => 'required|string|max:255',
            'content'    => 'required|string',
            'image'      => 'nullable|image|max:2048',
            'order'      => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('service_details', 'public');
        }

        ServiceDetail::create($validated);

        return redirect()->route('service-details.index')->with('success', 'Service detail created successfully.');
    }

    /**
     * Show the form for editing the specified service detail.
     */
    public function edit($id)
    {
        $detail = ServiceDetail::findOrFail($id);
        $services = Service::all();

        return view('service_details.edit', compact('detail', 'services'));
    }

    /**
     * Update the specified service detail in storage.
     */
    public function update(Request $request, $id)
    {
        $detail = ServiceDetail::findOrFail($id);

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'heading'    => 'required|string|max:255',
            'content'    => 'required|string',
            'image'      => 'nullable|image|max:2048',
            'order'      => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($detail->image) {
                Storage::disk('public')->delete($detail->image);
            }
            $validated['image'] = $request->file('image')->store('service_details', 'public');
        }

        $detail->update($validated);

        return redirect()->route('service-details.index')->with('success', 'Service detail updated successfully.');
    }

    /**
     * Remove the specified service detail from storage.
     */
    public function destroy($id)
    {
        $detail = ServiceDetail::findOrFail($id);

        if ($detail->image) {
            Storage::disk('public')->delete($detail->image);
        }

        $detail->delete();

        return redirect()->route('service-details.index')->with('success', 'Service detail deleted successfully.');
    }

    /**
     * Display a single service detail.
     */
    public function show($id)
    {
        $detail = ServiceDetail::findOrFail($id);
        return view('service_details.show', compact('detail'));
    }
}

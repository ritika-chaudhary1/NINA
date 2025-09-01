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

        return view('admin.service_details.index', compact('details'));
    }

    /**
     * Show the form for creating a new service detail.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.service_details.create', compact('services'));
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
            'description' => 'nullable|string',
             'personal_experience' => 'nullable|string', // ✅ NEW
            'our_processing' => 'nullable|string', // ✅ NEW
            'image' => 'nullable|image|max:2048',
              'image_two'=> 'nullable|image|max:2048', // ✅ NEW
            'order'=> 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('service_details', 'public');
        }

         if ($request->hasFile('image_two')) { // ✅ NEW
            $validated['image_two'] = $request->file('image_two')->store('service_details', 'public');
        }

        ServiceDetail::create($validated);

        return redirect()->route('admin.service_details.index')->with('success', 'Service detail created successfully.');
    }

    /**
     * Show the form for editing the specified service detail.
     */
    public function edit($id)
    {
        $detail = ServiceDetail::findOrFail($id);
        $services = Service::all();

        return view('admin.service_details.edit', compact('detail', 'services'));
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
            'description' => 'nullable|string',
            'personal_experience'  => 'nullable|string', // ✅ NEW
            'our_processing'       => 'nullable|string', // ✅ NEW
            'image'                => 'nullable|image|max:2048',
            'image_two'            => 'nullable|image|max:2048', // ✅ NEW
            
            'order'      => 'nullable|integer',
        ]);

        
        // Handle first image
        if ($request->hasFile('image')) {
            if ($detail->image) {
                Storage::disk('public')->delete($detail->image);
            }
            $validated['image'] = $request->file('image')->store('service_details', 'public');
        }

        // Handle second image ✅
        if ($request->hasFile('image_two')) {
            if ($detail->image_two) {
                Storage::disk('public')->delete($detail->image_two);
            }
            $validated['image_two'] = $request->file('image_two')->store('service_details', 'public');
        }

        $detail->update($validated);

        return redirect()->route('admin.service_details.index')->with('success', 'Service detail updated successfully.');
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

         if ($detail->image_two) { // ✅ delete second image
            Storage::disk('public')->delete($detail->image_two);
        }

        $detail->delete();

        return redirect()->route('admin.service_details.index')->with('success', 'Service detail deleted successfully.');
    }

    /**
     * Display a single service detail.
     */
    public function show($id)
    {
        $detail = ServiceDetail::findOrFail($id);
        return view('admin.service_details.show', compact('detail'));
    }
    
}

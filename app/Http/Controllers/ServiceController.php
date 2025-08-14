<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Display all services
    public function index()
    {
        $services = Service::with('serviceCategories')->latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    // Show form to create a new service
    public function create()
    {
        $serviceCategories = ServiceCategory::where('status', true)->get();
        return view('admin.services.create', compact('serviceCategories'));
    }

    // Store new service
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'service_categories' => 'required|array',
            'service_categories.*' => 'exists:service_categories,id',
        ]);

        $service = Service::create($request->only('title'));

        // Attach selected service categories
        $service->serviceCategories()->sync($request->service_categories);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service created successfully.');
    }

    // Show form to edit service
    public function edit($id)
    {
        $service = Service::with('serviceCategories')->findOrFail($id);
        $serviceCategories = ServiceCategory::where('status', true)->get();
        return view('admin.services.edit', compact('service', 'serviceCategories'));
    }

    // Update existing service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'service_categories' => 'required|array',
            'service_categories.*' => 'exists:service_categories,id',
        ]);

        $service->update($request->only('title'));

        // Update service categories
        $service->serviceCategories()->sync($request->service_categories);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service updated successfully.');
    }

    // Delete a service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->serviceCategories()->detach(); // Remove pivot table relations
        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service deleted successfully.');
    }

    // Show a single service (optional)
    public function show($id)
    {
        $service = Service::with('serviceCategories')->findOrFail($id);
        return view('admin.services.show', compact('service'));
    }
}

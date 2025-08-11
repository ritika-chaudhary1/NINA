<?php

namespace App\Http\Controllers;
use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
     // Display a listing of all services
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    // Show the form for creating a new service
    public function create()
    {
        return view('services.create');
    }

    // Store a newly created service in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        Service::create($request->only('title', 'short_description', 'icon'));

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }
      //for show
      
   public function show($id)
{
    $service = Service::with('details')->findOrFail($id);
    return view('services.show', compact('service'));
}


    // Show the form for editing the specified service
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    // Update the specified service in storage
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $service->update($request->only('title', 'short_description', 'icon'));

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully.');
    }

    // Remove the specified service from storage
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }
}

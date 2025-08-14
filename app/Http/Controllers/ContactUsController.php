<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

    $contact = ContactUs::create($validated);

    // Redirect to the show page with a success message
    return redirect()->route('admin.contact_us.index', $contact->id)->with('success', 'Message sent successfully!');
    }

    public function create()
{
    return view('admin.contact_us.create');
}

    // Admin: List all messages
    public function index()
    {
        $messages = ContactUs::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.contact_us.index', compact('messages'));
    }

    // Admin: Show a single message
    public function show($id)
{
    $contactUs = ContactUs::find($id);

    if (!$contactUs) {
        abort(404, 'Message not found');
    }

    return view('admin.contact_us.show', compact('contactUs'));
}

public function destroy(ContactUs $contactUs)
{
    $contactUs->delete();

    return redirect()->route('admin.contact_us.index')
                     ->with('success', 'Message deleted successfully!');
}

}

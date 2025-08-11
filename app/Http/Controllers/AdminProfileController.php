<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function show()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

public function update(Request $request)
{
    $admin = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $admin->id,
        'password' => 'nullable|confirmed|min:6',
        'profile_photo' => 'nullable|image|mimes:image,jpeg,png,jpg,gif,svg',
    ]);

    $admin->name = $request->name;
    $admin->email = $request->email;

    if ($request->filled('password')) {
        $admin->password = Hash::make($request->password);
    }

    // Handle profile photo upload
    if ($request->hasFile('profile_photo')) {
        // Delete old photo if exists
        if ($admin->profile_photo) {
            Storage::delete($admin->profile_photo);
        }
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $admin->profile_photo = $path;

    }

    $admin->save();

return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully.');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    /**
     * Show the admin profile page.
     */
    public function show()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

    /**
     * Update the admin profile.
     */
    public function update(Request $request)
    {
        $admin = Auth::user();

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|confirmed|min:6',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update basic fields
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Update password if provided
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        // Handle profile photo
        if ($request->hasFile('profile_photo')) {
            // Delete old photo from public disk if exists
            if ($admin->profile_photo) {
                Storage::disk('public')->delete($admin->profile_photo);
            }

            // Store new photo in public disk
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $admin->profile_photo = $path;
        }

        // Save changes
        $admin->save();

        return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully.');
    }
}

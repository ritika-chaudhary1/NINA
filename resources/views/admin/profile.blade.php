@extends('layouts.app') {{-- or your admin layout --}}

@section('content')
<div class="container mt-4">
    <h2>Admin Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $admin->name) }}" 
                   required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" 
                   name="email" 
                   id="email" 
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $admin->email) }}" 
                   required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password (leave blank to keep current)</label>
            <input type="password" 
                   name="password" 
                   id="password" 
                   class="form-control @error('password') is-invalid @enderror"
                   autocomplete="new-password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" 
                   name="password_confirmation" 
                   id="password_confirmation" 
                   class="form-control" 
                   autocomplete="new-password">
        </div>

        <div class="mb-3">
        <label for="profile_photo" class="form-label">Profile Photo</label>
        <input type="file" name="profile_photo" id="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror" accept="image/*">
        @error('profile_photo')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if ($admin->profile_photo)
      <div class="mb-3">
<img 
  src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-profile.png') }}" 
  alt="Admin Profile" 
  style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
      </div>
    @endif

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection

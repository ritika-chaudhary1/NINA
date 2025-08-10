@extends('layouts.app') {{-- or your main layout --}}

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
    <div class="card-body">
      <h3 class="card-title text-center mb-4">Admin Login</h3>

      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input 
            type="email" 
            name="email" 
            class="form-control @error('email') is-invalid @enderror" 
            id="email" 
            placeholder="admin@example.com" 
            value="{{ old('email') }}" 
            required 
            autofocus>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input 
            type="password" 
            name="password" 
            class="form-control @error('password') is-invalid @enderror" 
            id="password" 
            placeholder="••••••••" 
            required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Log In</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection

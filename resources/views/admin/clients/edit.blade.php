@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Client</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Client Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" name="website" id="website" value="{{ old('website', $client->website) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
            @if($client->logo)
                <img src="{{ asset('storage/' . $client->logo) }}" alt="Logo" width="120" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Client</button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

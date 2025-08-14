@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add Service Detail</h2>

    <form action="{{ route('admin.service_details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="service_id" class="form-label">Select Service</label>
            <select name="service_id" id="service_id" class="form-control" required>
                <option value="">-- Choose Service --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                @endforeach
            </select>
            @error('service_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="heading" class="form-label">Heading</label>
            <input type="text" name="heading" class="form-control" value="{{ old('heading') }}" required>
            @error('heading')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
            @error('content')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            <input type="file" name="image" class="form-control">
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Order (optional)</label>
            <input type="number" name="order" class="form-control" value="{{ old('order') }}">
            @error('order')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button type="submit" class="btn btn-success">Add Detail</button>
    </form>
</div>
@endsection

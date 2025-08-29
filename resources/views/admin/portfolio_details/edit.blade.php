@extends('admin.layouts.app')

@section('title', 'Edit Portfolio Detail: ' . $portfolio_detail->title)

@section('content')
<div class="container mt-5">
    <h2>Edit Portfolio Detail</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('admin.portfolio_details.update', $portfolio_detail) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" id="title" name="title" class="form-control" required 
                   value="{{ old('title', $portfolio_detail->title) }}">
        </div>

        <!-- Subtitle -->
        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control" 
                   value="{{ old('subtitle', $portfolio_detail->subtitle) }}">
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="portfolio_category_id">Category</label>
            <select name="portfolio_category_id" id="portfolio_category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $portfolio_detail->portfolio_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5">{{ old('description', $portfolio_detail->description) }}</textarea>
        </div>

        <!-- Client -->
        <div class="mb-3">
            <label for="client" class="form-label">Client</label>
            <input type="text" id="client" name="client" class="form-control" value="{{ old('client', $portfolio_detail->client) }}">
        </div>

        <!-- Location -->
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $portfolio_detail->location) }}">
        </div>

        <!-- Main Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Main Image</label>
            @if($portfolio_detail->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $portfolio_detail->image) }}" width="150" alt="Main Image" />
                </div>
            @endif
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <!-- Extra Images -->
        <div class="mb-3">
            <label for="extra_images" class="form-label">Extra Images</label><br />
            @if($portfolio_detail->extra_images && count($portfolio_detail->extra_images))
                <div class="mb-2">
                    @foreach($portfolio_detail->extra_images as $extra)
                        <img src="{{ asset('storage/' . $extra) }}" width="100" class="me-2 mb-2" alt="Extra Image" />
                    @endforeach
                </div>
            @else
                <p>No extra images uploaded.</p>
            @endif
            <input type="file" id="extra_images" name="extra_images[]" class="form-control" accept="image/*" multiple>
            <small class="text-muted">You can select multiple extra images</small>
        </div>

        <!-- Optional Image -->
        <div class="mb-3">
            <label for="optional_image" class="form-label">Image (optional)</label>
            @if($portfolio_detail->optional_image ?? false)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $portfolio_detail->optional_image) }}" width="150" alt="Optional Image" />
                </div>
            @endif
            <input type="file" id="optional_image" name="optional_image" class="form-control" accept="image/*">
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.portfolio_details.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

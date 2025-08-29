@extends('admin.layouts.app')

@section('title', 'Create Portfolio Detail')

@section('content')
<div class="container mt-5">
    <h2>Create Portfolio Detail</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('admin.portfolio_details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" id="title" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ old('subtitle') }}">
        </div>

        <div class="mb-3">
    <label for="portfolio_category_id">Category</label>
    <select name="portfolio_category_id" id="portfolio_category_id" class="form-control" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>
</div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="client" class="form-label">Client</label>
            <input type="text" id="client" name="client" class="form-control" value="{{ old('client') }}">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ old('location') }}">
        </div>     

        <div class="mb-3">
    <label for="image" class="form-label">Main Image</label>
    <input type="file" id="image" name="image" class="form-control" accept="image/*">
</div>

<div class="mb-3">
    <label for="extra_images" class="form-label">Extra Images</label>
    <input type="file" id="extra_images" name="extra_images[]" class="form-control" accept="image/*" multiple>
    <small class="text-muted">You can select multiple extra images</small>
</div>

            <div class="mb-3">
                <label for="optional_image" class="form-label">Optional Image</label>
                <input type="file" id="optional_image" name="optional_image" class="form-control" accept="image/*">
            </div>

<!-- Removed duplicate image input to ensure only one main image can be uploaded -->

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.portfolio_details.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

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

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" id="title" name="title" class="form-control" required value="{{ old('title', $portfolio_detail->title) }}">
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ old('subtitle', $portfolio_detail->subtitle) }}">
        </div>

        <div class="mb-3">
    <label for="portfolio_category_id">Category</label>
    <select name="portfolio_category_id" id="portfolio_category_id" class="form-control" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ (isset($portfolio_detail) && $portfolio_detail->portfolio_category_id == $category->id) ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>
</div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5">{{ old('description', $portfolio_detail->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="client" class="form-label">Client</label>
            <input type="text" id="client" name="client" class="form-control" value="{{ old('client', $portfolio_detail->client) }}">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $portfolio_detail->location) }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Current Image</label><br />
            @if($portfolio_detail->image)
                <img src="{{ asset('storage/' . $portfolio_detail->image) }}" alt="Image" width="150" class="mb-2" />
            @else
                <p>No image uploaded.</p>
            @endif
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.portfolio_details.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

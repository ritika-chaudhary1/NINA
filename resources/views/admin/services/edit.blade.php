@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Service: {{ $service->title }}</h2>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Service Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $service->title) }}" required>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="service_categories" class="form-label">Service Categories</label>
            <select name="service_categories[]" id="service_categories" class="form-select" multiple required>
                @foreach($serviceCategories as $category)
                    <option value="{{ $category->id }}" 
                        @if($service->serviceCategories->contains($category->id)) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple categories.</small>
            @error('service_categories') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Service</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create Service</h2>

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Service Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="service_categories" class="form-label">Service Categories</label>
            <select name="service_categories[]" id="service_categories" class="form-select" multiple required>
                @foreach($serviceCategories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, old('service_categories', [])) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple categories.</small>
            @error('service_categories') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Service</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

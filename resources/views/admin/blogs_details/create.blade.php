@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>➕ Create New Blog</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blogs_details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Blog Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter blog title" required>
        </div>

        <!-- New categories input -->
        <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select name="category" id="category" class="form-select" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->name }}"
                @if( (isset($selectedCategory) && $selectedCategory == $category->name) 
                     || old('category') == $category->name )
                    selected
                @endif
            >{{ $category->name }}</option>
        @endforeach
    </select>
    <small class="form-text text-muted">Select a category.</small>
</div>


        <div class="mb-3">
            <label for="description" class="form-label">Blog Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter blog description" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            <input type="file" 
                   class="form-control @error('image') is-invalid @enderror" 
                   id="image" 
                   name="image" 
                   accept="image/*">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">💾 Save Blog</button>
        <a href="{{ route('admin.blogs_details.index') }}" class="btn btn-secondary">⬅ Back</a>
    </form>
</div>
@endsection

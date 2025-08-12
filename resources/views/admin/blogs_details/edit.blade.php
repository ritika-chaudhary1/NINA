@extends('admin.layouts.app')

@section('title', 'Edit Blog: ' . $blogs_detail->title)

@section('content')
<div class="container mt-5">
    <h2>✏ Edit Blog</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blogs_details.update', $blogs_detail) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Blog Title</label>
            <input type="text" 
                   name="title" 
                   id="title" 
                   class="form-control" 
                   value="{{ old('title', $blogs_detail->title) }}" 
                   required>
        </div>

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
            <textarea name="description" 
                      id="description" 
                      class="form-control" 
                      rows="5" 
                      required>{{ old('description', $blogs_detail->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            @if($blogs_detail->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $blogs_detail->image) }}" alt="Current Image" style="max-width: 200px; max-height: 150px;">
                </div>
            @endif
            <input type="file" 
                   name="image" 
                   id="image" 
                   class="form-control @error('image') is-invalid @enderror" 
                   accept="image/*">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">💾 Update Blog</button>
        <a href="{{ route('admin.blogs_details.index') }}" class="btn btn-secondary">⬅ Back</a>
    </form>
</div>
@endsection

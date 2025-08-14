@extends('admin.layouts.app')

@section('title', 'Edit Blog Category')

@section('content')
<div class="container py-4">
    <h1>Edit Blog Category</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.blog_categories.update', $blogCategory) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="category" class="form-label">Category Name <span class="text-danger">*</span></label>
            <input 
                type="text" 
                id="category" 
                name="category" 
                class="form-control" 
                value="{{ old('category', $blogCategory->category) }}" 
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('admin.blog_categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

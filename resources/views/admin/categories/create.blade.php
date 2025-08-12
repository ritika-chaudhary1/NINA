@extends('admin.layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="container py-4">
    <h1>Create New Category</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
  <label for="type" class="form-label">Category Type</label>
  <select name="type" id="type" class="form-select" required>
    <option value="" disabled {{ old('type', $category->type ?? '') ? '' : 'selected' }}>-- Select Type --</option>
    <option value="blog" {{ old('type', $category->type ?? '') == 'blog' ? 'selected' : '' }}>Blog</option>
    <option value="service" {{ old('type', $category->type ?? '') == 'service' ? 'selected' : '' }}>Service</option>
    <option value="portfolio" {{ old('type', $category->type ?? '') == 'portfolio' ? 'selected' : '' }}>Portfolio</option>
  </select>
</div>


        <div class="mb-3">
            <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea id="description" name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save Category</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

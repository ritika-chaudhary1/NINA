@extends('admin.layouts.app')

@section('title', 'Create Blog Category')

@section('content')
<div class="container py-4">
    <h1>Create New Blog Category</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.blog_categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save Category</button>
        <a href="{{ route('admin.blog_categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

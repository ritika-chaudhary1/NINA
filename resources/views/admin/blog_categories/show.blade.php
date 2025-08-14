@extends('admin.layouts.app')

@section('title', 'Blog Category Details')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-3 text-primary">Blog Category Details</h2>

        <p><strong>Category Name:</strong> {{ $blogCategory->category }}</p>
        <p><strong>Created At:</strong> {{ $blogCategory->created_at->format('F d, Y h:i A') }}</p>
        <p><strong>Updated At:</strong> {{ $blogCategory->updated_at->format('F d, Y h:i A') }}</p>

            <a href="{{ route('admin.blog_categories.index') }}" class="btn btn-secondary">⬅ Back</a>
    </div>
</div>
@endsection

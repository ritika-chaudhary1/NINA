@extends('admin.layouts.app')

@section('title', 'All Blogs')

@section('content')
<div class="container py-4">
    <h1>All Blogs</h1>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Create New Blog</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($blogs->count())
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $index => $blog)
            <tr>
                <td>{{ $blogs->firstItem() + $index }}</td>
                <td>
                    @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 80px; height: auto;">
                    @else
                    <span class="text-muted">No image</span>
                    @endif
                </td>
                <td>{{ $blog->title }}</td>
                <td>{{ Str::limit($blog->description, 80) }}</td>
                <td>{{ $blog->created_at->format('d M, Y') }}</td>
                <td>
                    <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-secondary">Edit</a>

                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure to delete this blog?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $blogs->links() }}
    @else
    <p>No blogs found.</p>
    @endif
</div>
@endsection

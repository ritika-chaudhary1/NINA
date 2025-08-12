@extends('admin.layouts.app')

@section('title', 'All Blog Details')

@section('content')
<div class="container py-4">
    <h1>All Blog Details</h1>
    <a href="{{ route('admin.blogs_details.create') }}" class="btn btn-primary mb-3">Create New Blog</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Categories</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                @php
    $categories = json_decode($blog->categories, true);
    if (!is_array($categories)) {
        // fallback: treat categories as string, convert to array
        $categories = $blog->categories ? [$blog->categories] : [];
    }
@endphp
<td>{{ implode(', ', $categories) }}</td>
                <td>{{ Str::limit($blog->description, 80) }}</td>
                <td>
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" width="60">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.blogs_details.show', $blog) }}" class="btn btn-sm btn-outline-primary" title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.blogs_details.edit', $blog) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('admin.blogs_details.destroy', $blog) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure to delete this blog?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No blogs found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $blogs->links() }}
</div>
@endsection

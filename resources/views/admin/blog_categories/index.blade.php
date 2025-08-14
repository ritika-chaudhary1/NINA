@extends('admin.layouts.app')

@section('title', 'All Blog Categories')

@section('content')
<div class="container py-4">
    <h1>All Blog Categories</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($categories->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->category }}</td> <!-- Changed from name to category -->
                <td>
                    <a href="{{ route('admin.blog_categories.show', $category) }}" class="btn btn-sm btn-info" title="View">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.blog_categories.edit', $category) }}" class="btn btn-sm btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.blog_categories.destroy', $category) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this blog category?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }} <!-- Make sure $categories comes from paginate() -->

    @else
    <p>No blog categories found.</p>
    @endif
</div>
@endsection

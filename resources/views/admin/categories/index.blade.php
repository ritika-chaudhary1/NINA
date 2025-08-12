@extends('admin.layouts.app')

@section('title', 'All Categories')

@section('content')
<div class="container py-4">
    <h1>All Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">+ Create New Category</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($categories->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->type }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-sm btn-info" title="View">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this category?')">
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

    {{ $categories->links() }}

    @else
    <p>No categories found.</p>
    @endif
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>📂 Portfolio Categories</h2>
    <a href="{{ route('admin.portfolio_categories.create') }}" class="btn btn-primary mb-3">➕ Add New Category</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="{{ route('admin.portfolio_categories.show', $category) }}" class="btn btn-sm btn-outline-primary" title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.portfolio_categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('admin.portfolio_categories.destroy', $category) }}" method="POST" class="d-inline"
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
                <td colspan="3">No categories found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

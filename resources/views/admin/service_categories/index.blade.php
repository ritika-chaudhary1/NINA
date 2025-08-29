@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Service Categories</h2>
        <a href="{{ route('admin.service-categories.create') }}" class="btn btn-primary">Create New Category</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($serviceCategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ Str::limit($category->description, 50) }}</td>
                                <td>
                                    <span class="badge {{ $category->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $category->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                              

                                <td>
    <!-- View Button -->
    <a href="{{ route('admin.service-categories.show', $category) }}" 
       class="btn btn-sm btn-outline-primary" title="View">
        <i class="fas fa-eye"></i>
    </a>

    <!-- Edit Button -->
    <a href="{{ route('admin.service-categories.edit', $category) }}" 
       class="btn btn-sm btn-outline-secondary" title="Edit">
        <i class="fas fa-edit"></i>
    </a>

    <!-- Delete Button -->
    <form action="{{ route('admin.service-categories.destroy', $category) }}" 
          method="POST" class="d-inline"
          onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                                <td colspan="5" class="text-center">No service categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


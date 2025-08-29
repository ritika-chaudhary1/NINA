@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Services</h2>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">➕ Add New Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Service Categories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->title }}</td>
                    <td>
                        @if($service->serviceCategories->count() > 0)
                            @foreach($service->serviceCategories as $category)
                                <span class="badge bg-secondary">{{ $category->name }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">No categories</span>
                        @endif
                    </td>
                   
                     <td>
                        <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-sm btn-outline-primary" title="View">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this service?')">
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
                    <td colspan="4" class="text-center">No services found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="mt-3">
        {{ $services->links() }}
    </div>
</div>
@endsection

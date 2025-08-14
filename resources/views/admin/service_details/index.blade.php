@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Service Details</h2>
        <a href="{{ route('admin.service_details.create') }}" class="btn btn-primary">➕ Add Service Detail</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($details as $detail)
    <div class="card mb-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $detail->service->title }} - {{ $detail->heading }}</h5>
            <div class="btn-group" role="group">
                <a href="{{ route('admin.service_details.show', $detail->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('admin.service_details.edit', $detail->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.service_details.destroy', $detail->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this detail?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h6 class="text-muted">Content:</h6>
                    <p class="mb-3">{{ $detail->content }}</p>
                    
                    @if($detail->description)
                    <h6 class="text-muted">Description:</h6>
                    <p class="mb-3">{{ $detail->description }}</p>
                    @endif
                    
                    <div class="text-muted">
                        <small>Order: {{ $detail->order ?? 'Not set' }}</small>
                    </div>
                </div>
                <div class="col-md-4">
                    @if($detail->image)
                        <img src="{{ asset('storage/' . $detail->image) }}" alt="Service Detail Image" class="img-fluid rounded" style="max-height: 200px;">
                    @else
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-image fa-3x mb-2"></i>
                            <p>No image</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="text-center py-5">
        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
        <h4 class="text-muted">No service details found.</h4>
        <p class="text-muted">Start by adding your first service detail.</p>
    </div>
    @endforelse
</div>
@endsection

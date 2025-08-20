@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>{{ $detail->service->title }} - {{ $detail->heading }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5>Content:</h5>
                    <p class="mb-3">{{ $detail->content }}</p>
                    
                    @if($detail->description)
                    <h5>Description:</h5>
                    <p class="mb-3">{{ $detail->description }}</p>
                    @endif
                    
                    <div class="text-muted">
                        <small>Order: {{ $detail->order ?? 'Not set' }}</small>
                    </div>
                </div>
                <div class="col-md-4">
                    @if($detail->image)
                        <img src="{{ asset('storage/'.$detail->image) }}" alt="Service Detail Image" class="img-fluid rounded">
                    @else
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-image fa-3x mb-2"></i>
                            <p>No image</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.service_details.edit', $detail->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.service_details.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection

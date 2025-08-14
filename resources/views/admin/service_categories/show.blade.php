@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Service Category Details</h2>
        <div>
            <a href="{{ route('admin.service-categories.edit', $serviceCategory) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.service-categories.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Category Information</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">ID:</th>
                            <td>{{ $serviceCategory->id }}</td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $serviceCategory->name }}</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $serviceCategory->description ?: 'No description provided' }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                <span class="badge {{ $serviceCategory->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $serviceCategory->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Created:</th>
                            <td>{{ $serviceCategory->created_at->format('F j, Y g:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Updated:</th>
                            <td>{{ $serviceCategory->updated_at->format('F j, Y g:i A') }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h5 class="card-title">Associated Services</h5>
                    @if($serviceCategory->services->count() > 0)
                        <ul class="list-group">
                            @foreach($serviceCategory->services as $service)
                                <li class="list-group-item">{{ $service->title }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No services associated with this category.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


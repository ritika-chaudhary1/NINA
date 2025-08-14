@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Service Details</h2>
    <a href="{{ route('admin.service_details.create') }}" class="btn btn-primary mb-3">➕ Add Service Detail</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Service</th>
                <th>Image</th>

                <th>Heading</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($details as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detail->service->title }}</td>
                <td>
                @if($detail->image)
                    <img src="{{ asset('storage/' . $detail->image) }}" alt="Image" width="80">
                @else
                    No image
                @endif
            </td>
                <td>{{ $detail->heading }}</td>
                <td>{{ $detail->order ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.service_details.show', $detail->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.service_details.edit', $detail->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.service_details.destroy', $detail->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this detail?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No service details found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

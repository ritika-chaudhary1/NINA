{{-- @extends('layout') --}}
@extends('admin.layouts.app')


@section('content')
    <h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add Service</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Short Description</th>
            <th>Icon</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->title }}</td>
                <td>{{ $service->short_description }}</td>
                <td>{{ $service->icon }}</td>
                <td>
                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $services->links() }}
@endsection

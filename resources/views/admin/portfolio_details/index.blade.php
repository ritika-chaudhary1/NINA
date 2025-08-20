@extends('admin.layouts.app')

@section('title', 'Portfolio Details List')

@section('content')
<div class="container py-4">
    <h1>Portfolio Details</h1>
    <a href="{{ route('admin.portfolio_details.create') }}" class="btn btn-primary mb-3">Create New Portfolio Detail</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Category</th> <!-- New Column -->
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
               <th>Client</th>
               <th>Location</th>
        </tr>
    </thead>
    <tbody>
        @forelse($portfolio_details as $detail)
        <tr>
            <td>{{ $detail->title }}</td>
            <td>{{ $detail->subtitle }}</td>
            <td>{{ $detail->category->category_name ?? '-' }}</td> <!-- Show category -->
            <td>
                @if($detail->image)
                    <img src="{{ asset('storage/' . $detail->image) }}" alt="Image" width="60" />
                @endif
            </td>
            <td>{{ \Illuminate\Support\Str::limit($detail->description, 80) }}</td>
               <td>{{ $detail->client ?? 'N/A' }}</td>
               <td>{{ $detail->location ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('admin.portfolio_details.show', $detail) }}" class="btn btn-sm btn-outline-primary" title="View">
                    <i class="fas fa-eye"></i>
                </a>

                <a href="{{ route('admin.portfolio_details.edit', $detail) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>

                <form action="{{ route('admin.portfolio_details.destroy', $detail) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Are you sure to delete this portfolio detail?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No portfolio details found.</td></tr>
        @endforelse
    </tbody>
</table>


    {{ $portfolio_details->links() }}
</div>
@endsection

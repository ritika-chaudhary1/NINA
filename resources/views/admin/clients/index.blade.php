@extends('admin.layouts.app') {{-- Keep your actual layout --}}

@section('content')
<div class="container mt-5">
    <h2>👥 Clients List</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $client->name }}</td>
                <td>
                    @if($client->logo)
                        <img src="{{ asset('storage/' . $client->logo) }}" width="80" alt="logo">
                    @endif
                </td>
                <td><a href="{{ $client->website }}" target="_blank">{{ $client->website }}</a></td>
                 <td>
                    <a href="{{ route('admin.clients.show', $client) }}" class="btn btn-sm btn-outline-primary" title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure to delete this blog?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clients->links() }}
</div>
@endsection

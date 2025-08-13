@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="container mt-5">
    <h2>Contact Messages</h2>
    <a href="{{ route('admin.contact_us.create') }}" class="btn btn-primary mb-3">Create New Contact</a>

    @if($messages->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Sent At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $msg)
            <tr>
                <td>{{ $msg->id }}</td>
                <td>{{ $msg->name }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ $msg->subject ?? '-' }}</td>
                <td>{{ $msg->created_at->format('F d, Y H:i') }}</td>
                <td><a href="{{ route('admin.contact_us.show', $msg->id) }}" class="btn btn-primary btn-sm">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $messages->links() }}

    @else
    <p>No messages found.</p>
    @endif
</div>
@endsection

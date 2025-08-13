@extends('admin.layouts.app')

@section('title', 'Message Details')

@section('content')
<div class="container mt-5">
    <h2>Message Details</h2>

    <p><strong>Name:</strong> {{ $contactUs->name }}</p>
    <p><strong>Email:</strong> {{ $contactUs->email }}</p>
    <p><strong>Subject:</strong> {{ $contactUs->subject ?? '-' }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contactUs->message }}</p>
   <p><small>
    Sent at {{ $contactUs->created_at ? $contactUs->created_at->format('F d, Y H:i') : 'Unknown' }}
</small></p>

    <a href="{{ route('admin.contact_us.index') }}" class="btn btn-secondary">Back to Messages</a>
</div>
@endsection

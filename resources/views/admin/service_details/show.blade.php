@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Service Detail: {{ $detail->heading }}</h2>

    <p><strong>Service:</strong> {{ $detail->service->title }}</p>
    <p><strong>Content:</strong></p>
    <p>{{ $detail->content }}</p>

    @if($detail->image)
        <p><strong>Image:</strong></p>
        <img src="{{ asset('storage/'.$detail->image) }}" alt="Image" width="200">
    @endif

    <p><strong>Order:</strong> {{ $detail->order ?? '-' }}</p>

    <a href="{{ route('admin.service_details.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection

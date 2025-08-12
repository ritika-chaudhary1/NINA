@extends('admin.layouts.app')

@section('title', $blogs_detail->title)

@section('content')
<div class="container mt-5">
    <h2>{{ $blogs_detail->title }}</h2>
    <p class="text-muted">Posted on {{ $blogs_detail->created_at->format('F d, Y') }}</p>

    @php
    $categories = json_decode($blogs_detail->categories, true);
@endphp

@if(!empty($categories) && is_array($categories))
    <p><strong>Categories:</strong> {{ implode(', ', $categories) }}</p>
@else
    <p><strong>Categories:</strong> None</p>
@endif

    @if($blogs_detail->image)
        <img src="{{ asset('storage/' . $blogs_detail->image) }}" alt="{{ $blogs_detail->title }}" class="img-fluid mb-4" style="max-width: 500px;">
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <p>{!! nl2br(e($blogs_detail->description)) !!}</p>
        </div>
    </div>

    <a href="{{ route('admin.blogs_details.index') }}" class="btn btn-secondary">⬅ Back</a>
</div>
@endsection

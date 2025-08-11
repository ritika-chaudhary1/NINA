@extends('admin.layouts.app')

@section('title', $blog->title)

@section('content')
<div class="container py-4">
    <h1>{{ $blog->title }}</h1>
    <p><small>Posted on {{ $blog->created_at->format('d M, Y') }}</small></p>
    
    @if($blog->image)
    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mb-3" />
    @endif

    <p>{!! nl2br(e($blog->description)) !!}</p>

    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection

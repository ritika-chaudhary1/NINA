@extends('admin.layouts.app')

@section('title', $portfolio_detail->title)

@section('content')
<div class="container mt-5">
    <h1>{{ $portfolio_detail->title }}</h1>
    <h4 class="text-muted">{{ $portfolio_detail->subtitle }}</h4>

    @if($portfolio_detail->image)
        <img src="{{ asset('storage/' . $portfolio_detail->image) }}" alt="{{ $portfolio_detail->title }}" class="img-fluid mb-4" style="max-width: 600px;">
    @endif

    <p>{!! nl2br(e($portfolio_detail->description)) !!}</p>

    <a href="{{ route('admin.portfolio_details.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection

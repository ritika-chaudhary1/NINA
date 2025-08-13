@extends('admin.layouts.app')

@section('title', $portfolio->title)

@section('content')
<div class="container mt-4">
    <h2>{{ $portfolio->title }}</h2>
    <p><strong>Subtitle:</strong> {{ $portfolio->subtitle ?? 'N/A' }}</p>

    @if ($portfolio->image)
        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="img-fluid mb-4" style="max-width: 500px;">
    @endif

    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection

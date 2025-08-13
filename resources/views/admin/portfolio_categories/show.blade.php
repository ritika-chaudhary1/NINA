@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>👁 View Portfolio Category</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $portfolio_category->category_name }}</h5>
            <p><strong>Created At:</strong> {{ $portfolio_category->created_at->format('d M Y, h:i A') }}</p>
            <p><strong>Updated At:</strong> {{ $portfolio_category->updated_at->format('d M Y, h:i A') }}</p>
        </div>
    </div>
    <a href="{{ route('admin.portfolio_categories.index') }}" class="btn btn-secondary mt-3">⬅ Back</a>
</div>
@endsection

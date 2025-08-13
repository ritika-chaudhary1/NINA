@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>✏ Edit Portfolio Category</h2>
    <form action="{{ route('admin.portfolio_categories.update', $portfolio_category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control" value="{{ old('category_name', $portfolio_category->category_name) }}" required>
            @error('category_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.portfolio_categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Edit Portfolio: ' . $portfolio->title)

@section('content')
<div class="container mt-4">
    <h2>Edit Portfolio</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $portfolio->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $portfolio->subtitle) }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Current Image</label><br>
            @if ($portfolio->image)
                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Current Image" style="max-width: 200px; max-height: 150px;">
            @else
                <p>No image uploaded.</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Change Image (optional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

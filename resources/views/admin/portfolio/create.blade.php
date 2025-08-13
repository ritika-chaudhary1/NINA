@extends('admin.layouts.app')

@section('title', 'Create Portfolio')

@section('content')
<div class="container mt-4">
    <h2>Create Portfolio</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

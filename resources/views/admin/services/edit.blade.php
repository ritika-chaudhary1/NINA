

@extends('admin.layouts.app')

    <h1>Edit Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $service->title) }}">
        </div>

        <div class="mb-3">
            <label>Short Description</label>
            <textarea name="short_description" class="form-control">{{ old('short_description', $service->short_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Icon</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}">
        </div>

        <button class="btn btn-success">Update</button>
    </form>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Service Detail</h2>

    <form action="{{ route('admin.service_details.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="service_id" class="form-label">Select Service</label>
            <select name="service_id" id="service_id" class="form-control" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $detail->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="heading" class="form-label">Heading</label>
            <input type="text" name="heading" class="form-control" value="{{ $detail->heading }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $detail->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            @if($detail->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$detail->image) }}" alt="Current Image" width="100">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Order (optional)</label>
            <input type="number" name="order" class="form-control" value="{{ $detail->order }}">
        </div>

        <button type="submit" class="btn btn-success">Update Detail</button>
    </form>
</div>
@endsection

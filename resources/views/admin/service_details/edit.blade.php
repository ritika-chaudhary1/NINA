@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Service Detail</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.service_details.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Select Service -->
        <div class="mb-3">
            <label for="service_id" class="form-label">Select Service</label>
            <select name="service_id" id="service_id" class="form-control" required>
                <option value="">-- Choose Service --</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ $detail->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Heading -->
        <div class="mb-3">
            <label for="heading" class="form-label">Heading</label>
            <input type="text" name="heading" id="heading" class="form-control" value="{{ $detail->heading }}" required>
        </div>

        <!-- Content -->
        


         <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $detail->content }}</textarea>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $detail->description }}</textarea>
        </div>

        <!-- Personal Experience -->
        <div class="mb-3">
            <label for="personal_experience" class="form-label">Personal Experience</label>
            <textarea name="personal_experience" id="personal_experience" class="form-control" rows="3">{{ $detail->personal_experience }}</textarea>
        </div>

        <!-- Our Processing -->
        <div class="mb-3">
            <label for="our_processing" class="form-label">Our Processing</label>
            <textarea name="our_processing" id="our_processing" class="form-control" rows="3">{{ $detail->our_processing }}</textarea>
        </div>

        <!-- First Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Main Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @if($detail->image)
                <img src="{{ asset('storage/' . $detail->image) }}" class="mt-2 rounded" width="150">
            @endif
        </div>

        <!-- Second Image -->
        <div class="mb-3">
            <label for="image_two" class="form-label">Secondary Image</label>
            <input type="file" name="image_two" id="image_two" class="form-control" accept="image/*">
            @if($detail->image_two)
                <img src="{{ asset('storage/' . $detail->image_two) }}" class="mt-2 rounded" width="150">
            @endif
        </div>

        <!-- Order -->
        {{-- <div class="mb-3">
            <label for="order" class="form-label">Order (optional)</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ $detail->order }}">
        </div> --}}


        <button type="submit" class="btn btn-primary">Update Service Detail</button>
    </form>
</div>
@endsection


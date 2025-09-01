@extends('admin.layouts.app')

@section('content')
<div class="container mt-3">
    <h2>Add Service Detail</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.service_details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Select Service -->
        <div class="mb-3">
            <label for="service_id" class="form-label">Select Service</label>
            <select name="service_id" id="service_id" class="form-control" required>
                <option value="">-- Choose Service --</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Heading -->
        <div class="mb-3">
            <label for="heading" class="form-label">Heading</label>
            <input type="text" name="heading" id="heading" class="form-control" value="{{ old('heading') }}" required>
        </div>

        <!-- Content -->
         <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content"  class="form-control" rows="5" required>{{ old('content') }}</textarea>
        </div> 

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <!-- Personal Experience -->
        <div class="mb-3">
            <label for="personal_experience" class="form-label">Personal Experience</label>
            <textarea name="personal_experience" id="personal_experience" class="form-control" rows="3">{{ old('personal_experience') }}</textarea>
        </div>

        <!-- Our Processing -->
        <div class="mb-3">
            <label for="our_processing" class="form-label">Our Processing</label>
            <textarea name="our_processing" id="our_processing" class="form-control" rows="3">{{ old('our_processing') }}</textarea>
        </div>

        <!-- First Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Main Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <!-- Second Image -->
        <div class="mb-3">
            <label for="image_two" class="form-label">Secondary Image</label>
            <input type="file" name="image_two" id="image_two" class="form-control" accept="image/*">
        </div>

        <!-- Order -->
        {{-- <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', 0) }}">
        </div> --}}

         {{-- <div class="mb-3">
            <label for="order" class="form-label">Order (optional)</label>
            <input type="number" name="order" class="form-control" value="{{ old('order') }}">
            @error('order')<small class="text-danger">{{ $message }}</small>@enderror
        </div> --}}

        <button type="submit" class="btn btn-primary">Add Service Detail</button>
    </form>
</div>
@endsection


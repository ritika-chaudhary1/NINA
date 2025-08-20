@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section mb-2 rounded-bottom-3">
        <div class="container">
            <div class="row text-center text-white">
                <h1>{{ $service->title }} - Service Details</h1>
                <p>
                    <a href="{{ url('/') }}">Home</a> /
                    <a href="{{ route('service_all.index') }}">Services All</a> /
                    <span>{{ $service->title }}</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Service Details Section -->
    <section class="content container-fluid py-5 my-3 rounded-3">
        <div class="container">
            @if($serviceDetails->count() > 0)
                @foreach($serviceDetails as $detail)
                <div class="row mb-5">
                    <div class="col-lg-8">
                        <h2 class="mb-3">{{ $detail->heading }}</h2>
                        <div class="mb-4">
                            <p class="lead">{{ $detail->content }}</p>
                            @if($detail->description)
                                <p>{{ $detail->description }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($detail->image)
                            <img src="{{ asset('storage/' . $detail->image) }}" alt="{{ $detail->heading }}" class="img-fluid rounded-3 shadow-lg" />
                        @else
                            <div class="bg-light rounded-3 p-4 text-center">
                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                <p class="text-muted">No image available</p>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center py-5">
                    <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No details available for this service</h3>
                    <p class="text-muted">Please check back later for more information.</p>
                </div>
            @endif

            <!-- Service Categories -->
            @if($service->serviceCategories->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-3">Service Categories</h3>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($service->serviceCategories as $category)
                            <span class="badge bg-secondary fs-6 px-3 py-2">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section rounded-bottom-3 py-5 bg-dark text-white">
    <div class="container text-center">
        <h1 class="mb-2">All Services</h1>
        <p>
            <a href="{{ url('/') }}">Home</a> /
            <span>Service</span>
        
        </p>
    </div>
</section>

<!-- Services Section -->
<section class="services-section py-5 mt-4 rounded-3">
    <div class="container px-5">
        <h6 class="section-heading text-center">TOP FEATURES</h6>
        <h2 class="section-title text-black text-center mb-5">
            What <span class="text-danger">Services</span> I Provide To My Clients
        </h2>

        @if(isset($services) && $services->count() > 0)
            @foreach($services as $service)
                <div class="row py-3 border-top border-bottom border-secondary align-items-center">
                    <!-- Service Title -->
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                        <a href="{{ route('service_detail.index', $service) }}" 
                           class="text-black fw-bold text-decoration-none fs-4">
                           {{ $service->title }}
                        </a>
                    </div>

                    <!-- Service Categories -->
                    <div class="col-12 col-lg-8">
                        @if($service->serviceCategories->count() > 0)
                            @foreach($service->serviceCategories as $category)
                                <span class="d-inline-block px-3 py-1 me-2 mb-2 border border-secondary rounded-pill">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        @else
                            <span class="text-muted">No categories assigned</span>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center fs-5 text-muted">No services available at the moment.</p>
        @endif
    </div>
</section>

@endsection

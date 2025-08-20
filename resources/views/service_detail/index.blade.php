@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section mb-2 rounded-bottom-3">
        <div class="container">
            <div class="row text-center text-white">
                {{-- <h1>{{ $service->title }} - Service Details</h1> --}}
                <h1> Service Details</h1>
                
                <p>
                    <a href="{{ url('/') }}">Home</a> /
                    <a href="{{ route('service.index') }}">Services All</a> 
                    {{-- <span>{{ $service->title }}</span> --}}
                </p>
            </div>
        </div>
    </section>

    <!-- Service Details Section (Backend-driven) -->
    <section class="content container-fluid py-5 my-3 rounded-3">
        <div class="container">
            @php
                $first = $serviceDetails->get(0);
                $second = $serviceDetails->get(1);
                $third = $serviceDetails->get(2);
                $boxes = $serviceDetails->slice(3, 3)->values();
            @endphp

            <!-- Top image row -->
            <div class="row bg-black mb-4">
                @if($first && $first->image)
                <img src="{{ asset('storage/' . $first->image) }}" alt="service-image" class="img-fluid p-0">
                @else
                <img src="{{ asset('service_details/images/R.jpg') }}" alt="service-image" class="img-fluid p-0">
                @endif
            </div>

            <!-- Main detail -->
            <div class="row py-2">
                <h2 class="pt-2">
                    {{ $first?->heading ?? ($service->title . ' Details') }}
                </h2>
                <p>
                    {{ $first?->content ?? 'Details will be available soon.' }}
                </p>
                @if(!empty($first?->description))
                <p>
                    {{ $first->description }}
                </p>
                @endif
            </div>

            <!-- Personal Experience section (second detail) -->
            <div class="row py-2">
                <h2>
                    {{ $second?->heading ?? 'Personal Experience' }}
                </h2>
                <p>
                    {{ $second?->content ?? 'No additional information available yet.' }}
                </p>
                @if($second && $second->image)
                <img class="rounded-3" src="{{ asset('storage/' . $second->image) }}" alt="">
                @else
                <img class="rounded-3" src="{{ asset('service_details/images/R.jpg') }}" alt="">
                @endif

                @if(!empty($second?->description))
                <p class="pt-3">
                    {{ $second->description }}
                </p>
                @endif
            </div>

            <!-- Processing section (third detail) -->
            <div class="row py-2">
                <h2>
                    {{ $third?->heading ?? 'Our Processing' }}
                </h2>
                <p>
                    {{ $third?->content ?? 'Processing information will be added soon.' }}
                </p>
            </div>

            <!-- Boxes (next 3 details) -->
            <div class="row py-3">
                @forelse($boxes as $index => $box)
                    <div class="col-lg-4">
                        <div class="box shadow-lg rounded-3 p-4 h-100">
                            <h1 class="fw-bold">{{ sprintf('%02d', $index + 1) }}.</h1>
                            <h3>
                                {{ $box->heading }}
                            </h3>
                            <p>{{ Str::limit($box->content ?? '', 180) }}</p>
                        </div>
                    </div>
                @empty
                    <!-- Fallback static boxes if fewer details exist -->
                    <div class="col-lg-4">
                        <div class="box shadow-lg rounded-3 p-4 h-100">
                            <h1 class="fw-bold">01.</h1>
                            <h3>Concept Creation</h3>
                            <p>We outline the concept and define the objectives for the service.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box shadow-lg rounded-3 p-4 h-100">
                            <h1 class="fw-bold">02.</h1>
                            <h3>Check & Finalize</h3>
                            <p>We validate requirements, refine scope, and finalize deliverables.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box shadow-lg rounded-3 p-4 h-100">
                            <h1 class="fw-bold">03.</h1>
                            <h3>Approved</h3>
                            <p>The plan is approved and we proceed to implementation.</p>
                        </div>
                    </div>
                @endforelse
            </div>

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

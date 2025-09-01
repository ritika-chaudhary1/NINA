@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section mb-2 rounded-bottom-3">
        <div class="container">
            <div class="row text-center text-white">
                <h1> Service Details</h1>
                <p>
                    <a href="{{ url('/') }}">Home</a> /
                    <a href="{{ route('service.index') }}">Services All</a> 
                </p>
            </div>
        </div>
    </section>

    <!-- Service Details Section -->
    <section class="content container-fluid py-3 my-3 rounded-3">
        <div class="container">

             <!-- Service Categories -->
            @if($service->serviceCategories->count() > 0)
            <div class="row mt-2">
                <div class="col-12">
                    <h3 class="mb-3">Service Categories</h3>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($service->serviceCategories as $category)
                            <span class="badge bg-secondary fs-6 px-3 py-2 mb-3">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Top Banner Image -->
            <div class="row mb-5">
                <div class="col-12">
                    @if($serviceDetails->first()?->image)
                        <img src="{{ asset('storage/' . $serviceDetails->first()->image) }}" alt="main-service-image" class="img-fluid w-100 rounded-3 shadow">
                    @else
                        <img src="{{ asset('service_details/images/default-top.jpg') }}" alt="default-service" class="img-fluid w-100 rounded-3 shadow">
                    @endif
                </div>
            </div>

            <!-- Main Detail -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">
                        {{ $serviceDetails->first()?->heading ?? ($service->title . ' Details') }}
                    </h2>
                    <p class="text-muted">
                        {{ $serviceDetails->first()?->content ?? 'Details will be available soon.' }}
                    </p>
                    @if(!empty($serviceDetails->first()?->description))
                        <p>{{ $serviceDetails->first()->description }}</p>
                    @endif
                </div>
               
            </div>

            <!-- Personal Experience -->
            
          


               <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="fw-bold mb-3">Personal Experience</h2>
                    <p class="text-muted">
                        {{ $serviceDetails->first()?->personal_experience ?? 'No personal experience provided yet.' }}
                    </p>
                </div>
              
            </div>


              {{-- for image_two --}}
             <div class="row mb-5">
                <div class="col-12">

                    @if($serviceDetails->first()?->image_two)
                        <img src="{{ asset('storage/' . $serviceDetails->first()->image_two) }}" alt="experience-image" class="img-fluid w-100 rounded-3 shadow">
                    @else
                        <img src="{{ asset('service_details/images/experience.jpg') }}" alt="default-experience" class="img-fluid w-100 rounded-3 shadow">
                    @endif

                 </div>
            </div>

            <!-- Our Processing -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="fw-bold mb-3">Our Processing</h2>
                    <p class="text-muted">
                        {{ $serviceDetails->first()?->our_processing ?? 'Processing information will be added soon.' }}
                    </p>
                </div>
            </div>

            <!-- Process Boxes -->
            {{-- <div class="row py-3">
                @forelse($serviceDetails->skip(1)->take(3) as $index => $box)
                    <div class="col-lg-4 mb-4">
                        <div class="box shadow-lg rounded-3 p-4 h-100">
                            <h1 class="fw-bold text-primary">{{ sprintf('%02d', $index + 1) }}.</h1>
                            <h3 class="fw-semibold">{{ $box->heading }}</h3>
                            <p class="text-muted">{{ Str::limit($box->content ?? '', 180) }}</p>
                        </div>
                    </div>
                @empty
                    <!-- Fallback if fewer details -->
                    <div class="col-lg-4 mb-4">
                        <div class="box shadow-lg rounded-3 p-4 h-100">
                            <h1 class="fw-bold text-primary">01.</h1>
                            <h3>Concept Creation</h3>
                            <p>We outline the concept and define the objectives for the service.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="box shadow-lg rounded-3 p-4 h-100">
                            <h1 class="fw-bold text-primary">02.</h1>
                            <h3>Check & Finalize</h3>
                            <p>We validate requirements, refine scope, and finalize deliverables.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="box shadow-lg rounded-3 p-4 h-100">
                            <h1 class="fw-bold text-primary">03.</h1>
                            <h3>Approved</h3>
                            <p>The plan is approved and we proceed to implementation.</p>
                        </div>
                    </div>
                @endforelse
            </div> --}}

           
        </div>
    </section>
@endsection

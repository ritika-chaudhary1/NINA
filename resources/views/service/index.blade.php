@extends('layouts.app')

@section('content')
<section class="hero-section rounded-bottom-3">
    <div class="container">
        <div class="row text-center text-white">
            <h1>Services Details</h1>
            <p>
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ route('service_all.index') }}">Services All</a>
            </p>
        </div>
    </div>
</section>

<section class="services-section py-5 mt-3 mb-2 rounded-3">
    <div class="container px-5">
        <h6 class="section-heading text-center">TOP FEATURES</h6>
        <h2 class="section-title text-black text-center">
            What <span class="text-danger">Services</span> I Provide To My Clients In Here
        </h2>

        @foreach($services as $service)
        <div class="row py-3 border-top border-bottom border-secondary">
            <div class="col-12 col-lg-4">
                <a class="text-black fw-bold text-decoration-none fs-4"
                   href="{{ route('service_details.show', $service->id) }}">
                   {{ $service->title }}
                </a>
            </div>
            <div class="col-12 col-lg-8">
                @foreach($service->serviceCategories as $category)
                    <span class="text-start d-none d-sm-inline-block px-3 py-1 border border-secondary rounded-pill">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

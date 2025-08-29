@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section rounded-bottom-3">
    <div class="container">
        <div class="row text-center text-white">
            <h1>Portfolio Details</h1>
            <p>
                <a href="{{ url('/') }}">Home</a> / 
                <a href="{{ route('portfolios.index') }}">Portfolio All</a>
            </p>
        </div>
    </div>
</section>

<section class="content py-5 rounded-3">
    <div class="container">

        <!-- Main Image -->
        <div class="row mb-4">
            @php
                $mainImage = null;
                if (!empty($portfolio_detail->image)) {
                    if (is_string($portfolio_detail->image) && \Illuminate\Support\Str::startsWith($portfolio_detail->image, '[')) {
                        $mainImages = json_decode($portfolio_detail->image, true);
                        if (is_array($mainImages) && count($mainImages) > 0) {
                            $mainImage = $mainImages[0];
                        }
                    } else {
                        $mainImage = $portfolio_detail->image;
                    }
                }
            @endphp
            @if($mainImage)
                <img src="{{ asset('storage/' . $mainImage) }}" 
                     alt="{{ $portfolio_detail->title }}" 
                     class="img-fluid fixed-main-img w-100" />
            @else
                <img src="{{ asset('images/project-image.jpg') }}" 
                     alt="Portfolio Image" 
                     class="img-fluid fixed-main-img w-100" />
            @endif
        </div>

        <!-- Project Info -->
        <div class="row mb-4">
            <div class="col-lg-7 pt-3 pe-5">
                <h1 class="pb-3 text-black">{{ $portfolio_detail->title }}</h1>
                <p class="pb-3 text-secondary">{{ $portfolio_detail->subtitle }}</p>
                <p class="pb-3 text-secondary">{!! nl2br(e($portfolio_detail->description)) !!}</p>
            </div>

            <div class="col-lg-5">
                <div class="project-info p-3">
                    <h3>Project info</h3>
                    <div class="row">
                        <div class="col-6">
                            <h4>Category</h4>
                            <p>{{ $portfolio_detail->category->category_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                            <h4>Date</h4>
                            <p>{{ $portfolio_detail->created_at->format('d M, Y') }}</p>
                        </div>
                        <div class="col-6">
                            <h4>Clients</h4>
                            <p>{{ $portfolio_detail->client ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                            <h4>Location</h4>
                            <p>{{ $portfolio_detail->location ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional + Extra Images Side by Side -->
        <div class="row py-3">
            @php
                // Only show optional and extra images (not main image)
                $images = [];
                if (!empty($portfolio_detail->optional_image)) {
                    $images[] = $portfolio_detail->optional_image;
                }
                $extraImages = is_string($portfolio_detail->extra_images)
                    ? json_decode($portfolio_detail->extra_images, true)
                    : $portfolio_detail->extra_images;
                if (!empty($extraImages)) {
                    foreach($extraImages as $img) {
                        if(is_string($img) && !empty($img)) {
                            $images[] = $img;
                        }
                    }
                }
            @endphp

            @foreach($images as $image)
                @if(is_string($image))
                <div class="col-6 mb-3">
                    <img src="{{ asset('storage/' . $image) }}" 
                         alt="Portfolio Image" 
                         class="img-fluid fixed-portfolio-img w-100" />
                </div>
                @endif
            @endforeach
        </div>

    </div>
</section>

@endsection

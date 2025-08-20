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
    <!-- End Hero Section -->
    </section>

<section class="content py-5 rounded-3">
    <div class="container">
        @foreach($portfolio_details as $detail)
        <!-- Main Image -->
        <div class="row">
            @if($detail->image)
                <img src="{{ asset('storage/' . $detail->image) }}" alt="{{ $detail->title }}" class="img-fluid" />
            @else
                <img src="{{ asset('images/project-image.jpg') }}" alt="Portfolio Image" class="img-fluid" />
            @endif
        </div>

        <div class="row">
            <div class="col-lg-7 pt-5 pe-5">
                <h1 class="pb-3 text-black">{{ $detail->title }}</h1>
                <p class="pb-3 text-secondary">{{ $detail->subtitle }}</p>
                <p class="pb-3 text-secondary">{!! nl2br(e($detail->description)) !!}</p>
            </div>

            <div class="col-lg-5">
                <div class="project-info p-3">
                    <h3>Project info</h3>
                    <div class="row">
                        <div class="col-6">
                            <h4>Category</h4>
                            <p>{{ $detail->category->category_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                            <h4>Date</h4>
                            <p>{{ $detail->created_at->format('d M, Y') }}</p>
                        </div>
                        <div class="col-6">
                            <h4>Clients</h4>
                            <p>{{ $detail->client ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                            <h4>Location</h4>
                            <p>{{ $detail->location ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Images -->
        <div class="row py-3">
            @if($detail->extra_images)
                @foreach(json_decode($detail->extra_images) as $image)
                    <div class="col-lg-6 mb-3">
                        <img src="{{ asset('storage/' . $image) }}" alt="Extra Image" class="img-fluid" />
                    </div>
                @endforeach
            @else
                <div class="col-lg-6">
                    @if($detail->image)
                        <img src="{{ asset('storage/' . $detail->image) }}" alt="{{ $detail->title }}" class="img-fluid" />
                    @else
                        <img src="{{ asset('images/project-image.jpg') }}" alt="Portfolio Image" class="img-fluid" />
                    @endif
                </div>
                <div class="col-lg-6">
                    @if($detail->image)
                        <img src="{{ asset('storage/' . $detail->image) }}" alt="{{ $detail->title }}" class="img-fluid" />
                    @else
                        <img src="{{ asset('images/project-image.jpg') }}" alt="Portfolio Image" class="img-fluid" />
                    @endif
                </div>
            @endif
        </div>
        <hr>
        @endforeach

        <!-- Pagination links -->
        <div class="d-flex justify-content-center">
            {{ $portfolio_details->links() }}
        </div>
    </div>
</section>
@endsection

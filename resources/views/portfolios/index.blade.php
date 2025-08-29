@extends('layouts.app')

@section('content')

        <!-- Hero Section -->
        <section class="hero-section rounded-bottom-3">
            <div class="container">
                <div class="row text-center text-white">
                    <h1>Portfolio</h1>
                    <p>
                        <a href="{{ url('/') }}">Home</a> /
                        <a href="#">Portfolio Details</a>
                    </p>
                </div>
            </div>
        </section>
    </section>

    <!-- Projects Section -->
    <section class="projects-section py-5 bg-light rounded-3">
    <div class="container">
        <div class="text-center">
            <h6 class="shadow-lg p-1 p-sm-3 mb-5 bg-body-tertiary rounded d-inline-block">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="{{ route('portfolios.index') }}" class="btn btn-danger">All</a>
                    @foreach($categories as $category)
        <a href="{{ route('portfolios.index', ['category' => $category->id]) }}" 
           class="btn btn-outline-danger {{ $selectedCategory == $category->id ? 'active' : '' }}">
            {{ $category->category_name }}
        </a>
    @endforeach
                </div>
            </h6>
        </div>

        <div class="row">
            @foreach($portfolio_details as $detail)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('portfolio_detail.index', $detail) }}" class="text-decoration-none text-dark">
                    <div class="project-card">
                        @if($detail->image)
                            <img src="{{ asset('storage/' . $detail->image) }}" alt="{{ $detail->title }}" class="img-fluid" />
                        @else
                            <img src="{{ asset('images/project-image.jpg') }}" alt="{{ $detail->title }}" class="img-fluid" />
                        @endif
                        <div class="project-overlay">
                            <h3>{{ $detail->title }}</h3>
                            <p>{{ $detail->subtitle ?? 'Portfolio' }}</p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('portfolios.index') }}" class="btn btn-outline-danger">See More Works</a>
        </div>
    </div>
</section>


    @endsection

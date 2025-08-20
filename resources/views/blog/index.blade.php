@extends('layouts.app') {{-- or your layout file --}}

@section('content')
<!-- Hero Section -->
<section class="hero-section rounded-bottom-3">
    <div class="container">
        <div class="row text-center text-white">
            <h1>Blogs All</h1>
            <p>
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ route('blog_detail.index') }}">Blogs Detail</a>
            </p>
        </div>
    </div>
</section>

<!-- All Blogs Section -->
<section class="all-blogs py-4 rounded-3">
    <div class="container py-5">
        <div class="row g-4">

            @foreach($blogs as $blog)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="p-4 rounded-3 shadow-lg">
                        <p class="date text-secondary px-2 d-inline-block border border-dark rounded-3">
                            {{ $blog->created_at->format('d F, Y') }}
                        </p>
                        <h4>{{ $blog->title }}</h4>

                        @if($blog->image)
                            <img class="rounded" src="{{ asset('storage/' . $blog->image) }}" alt="blog-image">
                        @else
                            <img class="rounded" src="{{ asset('images/blog-image.jpg') }}" alt="blog-image">
                        @endif

                        <p class="text-secondary pt-3">
                            {{ \Illuminate\Support\Str::limit($blog->description, 120) }}
                        </p>

                        <a href="{{ route('blog_detail.index', $blog->id) }}" class="text-secondary px-2 d-inline-block border border-dark rounded-3">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endsection

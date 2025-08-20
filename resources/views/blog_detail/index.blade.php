@extends('layouts.app') {{-- Keep your actual layout --}}

@section('content')
<!-- Hero Section -->
<section class="hero-section rounded-bottom-3">
    <div class="container">
        <div class="row text-center text-white">
            <h1>Blogs Detail</h1>
            <p>
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ route('blog.index') }}">Blogs All</a>
            </p>
        </div>
    </div>
</section>

<!-- Blogs Detail Section -->
<section class="blogs-detail py-5 rounded-3" id="blogs-detail">
    <div class="container">
        {{-- Blog Main Image --}}
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="rounded-3 img-fluid">
        @else
            <img src="{{ asset('images/image.jpg') }}" alt="pic" class="rounded-3 img-fluid">
        @endif
    </div>

    <div class="container">
        <div class="row my-3 gy-3 rounded-3">
            <div class="col-lg-8 rounded-3">
                <div class="main-content">

                    {{-- Author / Categories / Date --}}
                    @php
    $categories = $all_categories;
@endphp
                    <p class="text-secondary py-4">
                        By: {{ $blog->author ?? 'Admin' }} /
                        @if(!empty($categories) && is_array($categories))
                            {{ implode(', ', $categories) }}
                        @else
                            Uncategorized
                        @endif
                        / Posted on {{ $blog->created_at->format('d M, Y') }}
                    </p>

                    {{-- Title --}}
                    <h1 class="py-4 text-black">{{ $blog->title }}</h1>

                    {{-- Description --}}
                    <div class="pb-4">
                        {!! nl2br(e($blog->description)) !!}
                    </div>

                    {{-- Optional: Featured Quote Block --}}
                    @if(!empty($blog->quote))
                        <div class="p-4 border border-4 border-danger border-top-0 border-end-0 rounded-3 shadow">
                            <p class="text-bold pb-4">{{ $blog->quote }}</p>
                            @if($blog->quote_author)
                                <p class="text-danger text-bold">___ {{ $blog->quote_author }}</p>
                            @endif
                        </div>
                    @endif

                    {{-- Optional: Additional Content / Images --}}
                    @if(!empty($blog->extra_content))
                        <p class="py-4">{!! nl2br(e($blog->extra_content)) !!}</p>
                    @endif

                    @if(!empty($blog->extra_image))
                        <img class="mt-3 rounded-3" src="{{ asset('storage/' . $blog->extra_image) }}" alt="pic">
                    @endif

                    {{-- Comment Form --}}
                    <div class="p-3 shadow rounded-3 mt-4">
                        <h2 class="text-black pb-3">Leave a Reply</h2>
                        <p class="text-secondary pb-4">Your email address will not be published. Required fields are marked *</p>
                        <input type="text" class="form-control my-3" placeholder="name">
                        <input type="email" class="form-control mb-3" placeholder="email">
                        <textarea class="form-control mb-3" placeholder="Write Comment" rows="3"></textarea>
                        <input class="btn btn-danger" type="submit" value="Submit">
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 rounded-3">
                <div class="side-content p-3 shadow-lg rounded-3">
                    <!-- Search -->
                    <h3 class="text-black pb-2 border-bottom">Search</h3>
                    <div class="row">
                        <div class="col-9">
                            <input type="text" class="form-control my-3" placeholder="Search">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-danger my-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="side-bar-icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Categories -->
                    <h3 class="text-black pb-2 mt-3 border-bottom">Categories</h3>
                    @if(!empty($all_categories) && count($all_categories))
                        @foreach($all_categories as $category)
                            <p><a href="#">{{ $category->category }}</a></p> <!-- because now $all_categories is models -->
                        @endforeach
                    @else
                        <p>No categories</p>
                    @endif

                    <!-- Recent Post -->
                    <h3 class="text-black pb-2 mt-3 border-bottom">Recent Post</h3>
                    @foreach($recent_blogs ?? [] as $recent)
                        <div class="row mb-3">
                            <div class="col-4">
                                <img src="{{ asset('storage/' . $recent->image) }}" alt="{{ $recent->title }}">
                            </div>
                            <div class="col-8">
                                <p class="text-secondary">{{ $recent->created_at->format('d M, Y') }}</p>
                                <h6 class="text-dark">{{ $recent->title }}</h6>
                            </div>
                        </div>
                    @endforeach

                    <!-- Tags -->
                    {{-- <h3 class="text-black pb-2 mt-3 border-bottom">Tags</h3>
                    <div class="row py-2 gy-3">
                        @foreach($blog->tags ?? [] as $tag)
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">{{ strtoupper($tag) }}</button>
                            </div>
                        @endforeach
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

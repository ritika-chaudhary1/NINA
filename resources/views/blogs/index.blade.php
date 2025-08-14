@extends('layouts.app')

@section('title', 'Blogs All')

@php
   
    $showContact = true;  // you can set false if you want to hide contact section here
@endphp

@section('hero')
<section class="hero-section mb-2 rounded-bottom-3">
    <div class="container">
        <div class="row text-center text-white">
            <h1>Blogs All</h1>
            <p>
                <a href="{{ url('/') }}">Home</a> / 
                <a href="{{ route('blogs_details') }}">Blogs Detail</a>
            </p>
        </div>
    </div>
</section>
@endsection


@section('content')
<section class="all-blogs py-4 rounded-3">
    <div class="container py-5">
        <div class="row g-4">
            @for ($i = 0; $i < 6; $i++)
                <div class="col-12 col-md-6 col-lg-4 ">
                    <div class="p-4 rounded-3 shadow-lg">
                        <p class="date text-secondary px-2 d-inline-block border border-dark rounded-3">
                            16 November, 2023
                        </p>
                        <h4>How to make a website using WordPress</h4>
                        <img
                            class="rounded"
                            src="{{ asset('blogs/images/illustration-people-office-working-laptops-together_973328-3477.avif') }}"
                            alt="picture"
                        />
                        <p class="text-secondary pt-3">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid, cum.
                        </p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
@endsection

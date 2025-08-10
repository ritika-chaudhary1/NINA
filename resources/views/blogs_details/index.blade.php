@extends('layouts.app')

@section('title', 'Blogs Detail')

 {{-- @push('styles')
<link rel="stylesheet" href="{{ asset('css/blogs_details.css') }}" />
@endpush --}}

@php
    $hideContactSection = true;
@endphp

<!-- Hero Section -->
@section('hero')

<section class="hero-section mb-2 rounded-bottom-3">
    <div class="container">
        <div class="row text-center text-white">
            <h1>Blogs Detail</h1>
            <p>
                <a href="{{ url('/') }}">Home</a> / 
                <a href="{{ url('/blogs') }}">Blogs All</a>
            </p>
        </div>
    </div>
</section>

@endsection

@section('content')
    {{-- @include('partials.navbar')   --}}

  

    <section class="blogs-detail my-3 py-5 rounded-3">
        <div class="container">
            <img src="{{ asset('blogs/images/image.jpg') }}" alt="pic" />
        </div>
        <div class="container">
            <div class="row my-3 gy-3 rounded-3">
                <div class="col-lg-8 rounded-3">
                    <div class="main-content">
                        <p class="text-secondary py-4">
                            By: amin/ Lifestyle/ Posted on 16th Nov, 2023
                        </p>
                        <h1 class="py-4 text-black">Fresh design ideas for 2023 & inspiration</h1>
                        <p class="pb-4">
                            There are many variation of Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ex consequatur
                            molestiae, debitis earum unde sit autem soluta eaque vel totam dolor modi reiciendis labore doloribus. A dolor
                            modi nostrum officia minima accusantium consequatur, explicabo laborum sapiente accusamus repellat quo.
                        </p>
                        <p class="pb-4">
                            There are many variation of Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ex consequatur
                            molestiae, debitis earum unde sit autem soluta eaque vel totam dolor modi reiciendis labore doloribus. A dolor
                            modi nostrum officia minima accusantium consequatur, explicabo laborum sapiente accusamus repellat quo.
                        </p>

                        <div class="p-4 border border-4 border-danger border-top-0 border-end-0 rounded-3 shadow">
                            <p class="text-bold pb-4">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati ullam sint deleniti, aliquid cum odit minus
                                animi reprehenderit fugit eaque nisi adipisci ipsam debitis temporibus illum dolorem veniam aliquam dignissimos.
                            </p>

                            <p class="text-danger text-bold">___  David Kingston</p>
                        </div>
                        <p class="py-4">
                            On the other hand, we denounce with righteous Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                            quis vero vel repellendus ab a odio, mollitia dolor atque sapiente consectetur tenetur molestiae voluptate neque,
                            et illo saepe iste id culpa expedita molestias! Assumenda deserunt reiciendis ducimus dolorem illum corrupti
                            cupiditate esse doloremque! Unde illo animi debitis suscipit, fugiat sunt at voluptas molestias atque eius amet
                            minus, tempora impedit accusantium.
                        </p>
                        <h2 class="text-bold text-black pt-2 pb-4">Nina is the only theme you will ever need</h2>
                        <p class="pb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quis sapiente fugit delectus maxime distinctio,
                            est, necessitatibus dicta veniam accusantium impedit et! Beatae assumenda ut repudiandae modi magnam nesciunt
                            laudantium illo, enim consequuntur eligendi iusto ad voluptatum sunt animi architecto, perferendis esse inventore?
                            Praesentium reiciendis ex ipsum nulla, commodi nam quis nihil sint provident adipisci quasi dolorem numquam
                            recusandae vero ab debitis velit quisquam, incidunt facere iste voluptatem? Nesciunt numquam porro dolores, sit
                            sed dicta sequi? Repellat asperiores impedit possimus explicabo corrupti ipsam in labore dolore velit architecto
                            corporis, recusandae reprehenderit iusto est consequuntur laboriosam, culpa voluptate, aliquam nostrum. Expedita?
                        </p>

                        <img
                            class="mt-3 rounded-3"
                            src="{{ asset('blogs/images/image.jpg') }}"
                            alt="pic"
                        />

                        <div class="p-3 shadow rounded-3 mt-4">
                            <h2 class="text-black pb-3">Leave a Reply</h2>
                            <p class="text-secondary pb-4">
                                Your email address will not be published. Required fields are marked *
                            </p>
                            <input
                                type="text"
                                class="form-control my-3"
                                id="exampleFormControlInput1"
                                placeholder="name"
                            />
                            <input
                                type="email"
                                class="form-control mb-3"
                                id="exampleFormControlInput2"
                                placeholder="email"
                            />
                            <textarea
                                class="form-control mb-3"
                                placeholder="Write Comment"
                                id="exampleFormControlTextarea1"
                                rows="3"
                            ></textarea>
                            <input class="btn btn-danger" type="submit" value="Submit" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 rounded-3">
                    <div class="side-content p-3 shadow-lg rounded-3">
                        <!-- search section -->
                        <h3 class="text-black pb-2 border-bottom">Search</h3>
                        <div class="row">
                            <div class="col-9">
                                <input
                                    type="text"
                                    class="form-control my-3"
                                    id="exampleFormControlInput1"
                                    placeholder="Search"
                                />
                            </div>
                            <div class="col-3">
                                <button class="btn btn-danger my-3" type="submit">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="side-bar-icon"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- category section -->
                        <h3 class="text-black pb-2 mt-3 border-bottom">Categories</h3>
                        <p><a href="#">Creative</a></p>
                        <p><a href="#">Business</a></p>
                        <p><a href="#">Design</a></p>
                        <p><a href="#">Marketing</a></p>
                        <p><a href="#">Lifestyle</a></p>
                        <!-- Recent post section -->
                        <h3 class="text-black pb-2 mt-3 border-bottom">Recent Post</h3>
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('blogs/images/img.png') }}" alt="pic" />
                            </div>
                            <div class="col-8">
                                <p class="text-secondary">16 Nov, 2023</p>
                                <h6 class="text-dark">how to make a website using WordPress</h6>
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('blogs/images/img.png') }}" alt="pic" />
                            </div>
                            <div class="col-8">
                                <p class="text-secondary">16 Nov, 2023</p>
                                <h6 class="text-dark">fresh design ideas for 2023 & inspiration</h6>
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('blogs/images/img.png') }}" alt="pic" />
                            </div>
                            <div class="col-8">
                                <p class="text-secondary">16 Nov, 2023</p>
                                <h6 class="text-dark">how to make a website using WordPress</h6>
                            </div>
                        </div>
                        <!-- tags section -->
                        <h3 class="text-black pb-2 mt-3 border-bottom">Tags</h3>
                        <div class="row py-2 gy-3">
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">BUSINESS</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">DIGITAL</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">AUDIO POST</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">GALLERY POST</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">MARKETING</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">AGENCY</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">GRAPHIC</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger">WEB DEVELOPMENT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection

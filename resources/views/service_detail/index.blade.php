@extends('layouts.app')

@section('content')
    <section class="header">
        <!-- Hero Section -->
        <section class="hero-section rounded-bottom-3">
            <div class="container">
                <div class="row text-center text-white">
                    <h1>Services Details</h1>
                    <p>
                        <a href="{{ url('/') }}">Home</a> /
                        <a href="{{ route('service.index') }}">Services All</a>
                    </p>
                </div>
            </div>
        </section>
    </section>

    <!-- details section start -->
    <section class="content container-fluid py-5 rounded-3">
        <div class="container">
            <div class="row bg-black">
                <img src="{{ asset('images/R.jpg') }}" alt="pic" />
            </div>
            <div class="row py-2">
                <h2 class="pt-2">
                    How To Improve And Measure Your Progress learning application Design
                </h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit non commodi unde ex fuga iste nostrum iure iusto! Voluptatem, vero? Quasi, sapiente consequatur eaque illo deleniti quo velit possimus ut. Enim ipsam quis expedita, soluta saepe quaerat impedit! Quam aut natus quisquam eligendi ipsa voluptas quaerat, in laboriosam unde culpa odio fuga, nisi error, ducimus molestiae est. Aperiam, facilis accusamus!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit non commodi unde ex fuga iste nostrum iure iusto! Voluptatem, vero? Quasi, sapiente consequatur eaque illo deleniti quo velit possimus ut. Enim ipsam quis expedita, soluta saepe quaerat impedit! Quam aut natus quisquam eligendi ipsa voluptas quaerat, in laboriosam unde culpa odio fuga, nisi error, ducimus molestiae est. Aperiam, facilis accusamus!
                </p>
            </div>
            <div class="row py-2">
                <h2>Personal Experience</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit non commodi unde ex fuga iste nostrum iure iusto! Voluptatem, vero? Quasi, sapiente consequatur eaque illo deleniti quo velit possimus ut. Enim ipsam quis expedita, soluta saepe quaerat impedit! Quam aut natus quisquam eligendi ipsa voluptas quaerat, in laboriosam unde culpa odio fuga, nisi error, ducimus molestiae est. Aperiam, facilis accusamus!
                </p>
                <img class="rounded-3" src="{{ asset('images/R.jpg') }}" alt="" />
                <p class="pt-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum perspiciatis tempora quibusdam a. Ea quas quisquam perspiciatis aut totam debitis aliquam natus dicta blanditiis earum labore, magnam aperiam asperiores suscipit, dolorem sint deleniti atque vitae laudantium quam similique nobis? Nostrum, corporis mollitia modi provident voluptate necessitatibus a dolore, quas corrupti nesciunt labore aliquam, accusantium distinctio placeat possimus et quasi! Doloremque, ratione sunt? Impedit expedita ut maxime vitae ipsum inventore neque dolores veritatis, error, sunt consequatur tempore? Voluptatibus ad assumenda sunt!
                </p>
            </div>
            <div class="row py-2">
                <h2>Our Processing</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit non commodi unde ex fuga iste nostrum iure iusto! Voluptatem, vero? Quasi, sapiente consequatur eaque illo deleniti quo velit possimus ut. Enim ipsam quis expedita, soluta saepe quaerat impedit! Quam aut natus quisquam eligendi ipsa voluptas quaerat, in laboriosam unde culpa odio fuga, nisi error, ducimus molestiae est. Aperiam, facilis accusamus!
                </p>
            </div>
            <div class="row py-3">
                <div class="col-lg-4">
                    <div class="box shadow-lg rounded-3 p-4">
                        <h1 class="fw-bold">01.</h1>
                        <h3>_____Concept Creation</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi porro voluptatibus architecto ullam repellat alias?</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box shadow-lg rounded-3 p-4">
                        <h1 class="fw-bold">01.</h1>
                        <h3>_____Check &amp; Finalize</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi porro voluptatibus architecto ullam repellat alias?</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box shadow-lg rounded-3 p-4">
                        <h1 class="fw-bold">01.</h1>
                        <h3>_____Approved</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi porro voluptatibus architecto ullam repellat alias?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@extends('layouts.app')
@section('title', 'Service All')

        <!-- Hero Section -->
        <section class="hero-section mb-2 rounded-bottom-3">
            <div class="container">
                <div class="row text-center text-white">
                    <h1>Services All</h1>
                    <p>
                        <a href="{{ url('/') }}">Home</a> / 
                        <a href="{{ url('service-details/service.html') }}">Services Details</a>
                    </p>
                </div>
            </div>
        </section>
    </section>

    <!-- Services Section -->
   {{-- <section class="services-section py-5 mt-3 mb-2 rounded-3">
            <div class="container px-5">
                <h6 class="section-heading text-center">TOP FEATURES</h6>
                <h2 class="section-title text-black text-center">What <span class="text-danger">Services</span> I Provide To
                    My Clients In Here</h2>

                <!-- first -->
                @foreach($services as $service)
                <div class="row py-3 border-top border-bottom border-secondary">
                    <div class="col-12 col-lg-4">
                        <a class="text-black fw-bold text-decoration-none fs-4" href="#">{{ $services->title }}</a>
                    </div>
                    <div class="col-12 col-lg-8">
               
                        <span
                            class="text-start d-none d-sm-inline-block px-3 py-1 border border-secondary rounded-pill">WordPress
                        </span>
                        <span class="text-start d-none d-sm-inline-block px-3 py-1 border border-secondary rounded-pill">
                            Brand </span>
                        <span class="text-start d-none d-sm-inline-block px-3 py-1 border border-secondary rounded-pill">
                            Laravel </span>
                    </div>
                </div>
                @endforeach

                 
         

            </div>
        </section>

@endsection --}}


    <section class="services-section py-5 mt-3 mb-2 rounded-3">
        <div class="container px-5">
            <h6 class="section-heading text-center">TOP FEATURES</h6>
            <h2 class="section-title text-black text-center">
                What <span class="text-danger">Services</span> I Provide To My Clients In Here
            </h2>
            
            <!-- first -->
            <div class="row py-3 border-top border-bottom border-secondary">
                <div class="col-12 col-lg-4">
                    <a class="text-black fw-bold fs-4" href="#">Web Development</a>
                </div>
                <div class="col-12 col-lg-8 gy-5">
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">WordPress</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Brand</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Laravel</span>
                </div>
            </div>

            <!-- second -->
            <div class="row py-3 border-bottom border-secondary">
                <div class="col-12 col-lg-4">
                    <a class="text-black fw-bold fs-4" href="#">Application Design</a>
                </div>
                <div class="col-12 col-lg-8 gy-3">
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">UI/UX Design</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Landing</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Mobile &amp; Web App</span>
                </div>
            </div>

            <!-- third -->
            <div class="row py-3 border-bottom border-secondary">
                <div class="col-12 col-lg-4">
                    <a class="text-black fw-bold fs-4" href="#">Brand Identity</a>
                </div>
                <div class="col-12 col-lg-8 gy-3">
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Stationery</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Brand Design</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Card Design</span>
                </div>
            </div>

            <!-- fourth -->
            <div class="row py-3 border-bottom border-secondary">
                <div class="col-12 col-lg-4">
                    <a class="text-black fw-bold fs-4" href="#">Digital Marketing</a>
                </div>
                <div class="col-12 col-lg-8 gy-3">
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Social Media</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Youtube</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">SEO Analytics</span>
                </div>
            </div>

            <!-- fifth -->
            <div class="row py-3 border-bottom border-secondary">
                <div class="col-12 col-lg-4">
                    <a class="text-black fw-bold fs-4" href="#">Graphic Design</a>
                </div>
                <div class="col-12 col-lg-8 gy-3">
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Mockup Design</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Flyer Design</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Card Design</span>
                </div>
            </div>

            <!-- sixth -->
            <div class="row py-3 border-bottom border-secondary">
                <div class="col-12 col-lg-4">
                    <a class="text-black fw-bold fs-4" href="#">Ui/Ux Mobile Design</a>
                </div>
                <div class="col-12 col-lg-8 gy-3">
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">UI/UX Design</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Landing</span>
                    <span class="text-start px-3 py-1 border border-secondary rounded-pill">Mobile &amp; Web App</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients section -->

    <!-- Bootstrap JS Bundle -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}

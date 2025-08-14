    @extends('layouts.app')

    @section('content')
        <!-- Hero Section -->
        <section class="hero-section mb-2 rounded-bottom-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h3 class="hero-text text-white">HELLO,<span class="text-danger"> I AM</span></h3>
                        <h1 class="hero-title">Nina <span class="text-danger"> Simone</span></h1>
                        <h3 class="hero-text text-white">I AM <span class="fst-italic">WordPress Developer</span></h3>
                        <p class="hero-text">
                            I'm a Web developer & I'm very passionate and dedicated to my work. I have acquired the skills
                            and knowledge
                            necessary to make your project a success.
                        </p>
                        <div class="hero-buttons">
                            <button class="btn btn-outline-danger text me-3">Hire Me</button>
                            <button class="btn btn-danger">Download CV</button>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-4 d-flex text-align-center gx-3">
                                <h1 class="text-white">16</h1>
                                <p class="hero-text"> Years of Experience</p>
                            </div>
                            <div class="col-lg-4 d-flex text-align-center gx-3">
                                <h1 class="text-white">6k</h1>
                                <p class="hero-text"> Clients worldwide</p>
                            </div>
                            <div class="col-lg-4 d-flex text-align-center gx-3">
                                <h1 class="text-white">2k</h1>
                                <p class="hero-text"> Completed Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('images/developer.webp') }}" alt="Developer" class="img-fluid rounded" />
                    </div>
                </div>
            </div>
        </section>
        </section>



        <!-- Services Section -->
        <section class="services-section py-5 mt-3 mb-2 rounded-3">
            <div class="container px-5">
                <h6 class="section-heading text-center">TOP FEATURES</h6>
                <h2 class="section-title text-black text-center">What <span class="text-danger">Services</span> I Provide To
                    My Clients In Here</h2>

                <!-- first -->
                @foreach($service as $services)
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


        <!-- Projects Section -->
        <section class="projects-section py-5 bg-light mt-3 mb-2 rounded-3">
            <div class="container">
                <h6 class="section-heading text-center">MY PROJECT</h6>
                <h2 class="section-title text-black text-center">My Recent <span class="text-danger">Projects</span></h2>

                <div class="row">
                    <!-- Project 1 -->
                    <div class="col-md-4">
                        <div class="project-card">
                            <img src="{{ asset('images/project-image.jpg') }}" alt="Mobile App Design" class="img-fluid">
                            <div class="project-overlay">
                                <h3>Mobile App Design</h3>
                                <p>App Design</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="col-md-4">
                        <div class="project-card">
                            <img src="{{ asset('images/project-image.jpg') }}" alt="Product Design" class="img-fluid">
                            <div class="project-overlay">
                                <h3>Product Design</h3>
                                <p>Online Product Design</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div class="col-md-4">
                        <div class="project-card">
                            <img src="{{ asset('images/project-image.jpg') }}" alt="Branding Design" class="img-fluid">
                            <div class="project-overlay">
                                <h3>Branding Design</h3>
                                <p>Digital Agency Branding</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 4 -->
                    <div class="col-md-4">
                        <div class="project-card">
                            <img src="{{ asset('images/project-image.jpg') }}" alt="App Landing Page" class="img-fluid">
                            <div class="project-overlay">
                                <h3>App Landing Page</h3>
                                <p>Design</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 5 -->
                    <div class="col-md-4">
                        <div class="project-card">
                            <img src="{{ asset('images/project-image.jpg') }}" alt="Mobile App" class="img-fluid">
                            <div class="project-overlay">
                                <h3>Mobile App</h3>
                                <p>App Design</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 6 -->
                    <div class="col-md-4">
                        <div class="project-card">
                            <img src="{{ asset('images/project-image.jpg') }}" alt="Apps Design" class="img-fluid">
                            <div class="project-overlay">
                                <h3>Apps Design</h3>
                                <p>Mobile Application Design</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-outline-danger">See More Works</button>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section py-5 mt-3 mb-2 rounded-3">
            <div class="container">
                <h6 class="section-heading text-center">I AM A WORDPRESS DEVELOPER</h6>
                <h2 class="section-title text-black text-center">I Develop <span class="text-danger">Skills</span>
                    Regularly to keep Me Update</h2>

                <div class="row text-center mx-5 gx-5 gy-3 shadow-lg p-3 mb-5 rounded">
                    <div class="col-12 col-md-3">
                        <button type="button" class="btn btn-outline-danger">My Education</button>

                    </div>
                    <div class="col-12 col-md-3">
                        <button type="button" class="btn btn-outline-danger">My Experience</button>

                    </div>
                    <div class="col-12 col-md-3">
                        <button type="button" class="btn btn-outline-danger">Professional Skills</button>

                    </div>
                    <div class="col-12 col-md-3">
                        <button type="button" class="btn btn-outline-danger">My Awards</button>

                    </div>
                </div>

                <div class="timeline">
                    <!-- Item 1 -->
                    <div class="timeline-item left">
                        <div class="timeline-content shadow-lg">
                            <div class="date">2012 - 2013</div>
                            <h5>Programming Course</h5>
                            <p class="mb-1 text-muted">Harvard University</p>
                            <hr />
                            <p class="mb-0 text-muted">
                                Duis aute irure dolor in reprehenderit in voluptate velit
                                excepteur sint occaecat cupidatat non proident, sunt in culpa
                            </p>
                        </div>
                        <div class="circle red"></div>
                    </div>

                    <!-- Item 2 -->
                    <div class="timeline-item right">
                        <div class="timeline-content shadow-lg">
                            <div class="date2">2014 - 2015</div>
                            <h5>AS - Science & Information</h5>
                            <p class="mb-1 text-muted">University of California</p>
                            <hr />
                            <p class="mb-0 text-muted">
                                Duis aute irure dolor in reprehenderit in voluptate velit
                                excepteur sint occaecat cupidatat non proident, sunt in culpa
                            </p>
                        </div>
                        <div class="circle2"></div>

                    </div>

                    <!-- Item 3 -->
                    <div class="timeline-item left">
                        <div class="timeline-content shadow-lg">
                            <div class="date">2015 - 2017</div>
                            <h5>Web Design Course</h5>
                            <p class="mb-1 text-muted">Bigtown, England</p>
                            <hr />
                            <p class="mb-0 text-muted">
                                Duis aute irure dolor in reprehenderit in voluptate velit
                                excepteur sint occaecat cupidatat non proident, sunt in culpa
                            </p>
                        </div>
                        <div class="circle"></div>

                    </div>
                </div>


            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials-section py-5 bg-light mt-3 mb-2 rounded-3">
            <div class="container">

                <h6 class="section-heading text-center">TESTINOMIALS</h6>
                <h2 class="section-title text-black text-center">The Best <span class="text-danger">Customers</span> Says
                    About Me</h2>

                <div class="row py-4 border-bottom border-secondary">
                    <div class="col-12 text-center col-lg-8 text-lg-start">
                        <img class="rounded-circle customers" src="{{ asset('images/customer-1.jpg') }}" alt="customers">
                        <img class="rounded-circle customers" src="{{ asset('images/customer-2.jpg') }}" alt="customers">
                        <img class="rounded-circle customers" src="{{ asset('images/customer-3.jpg') }}" alt="customers">
                        <img class="rounded-circle customers" src="{{ asset('images/customer-4.jpg') }}"
                            alt="customers">
                        <img class="rounded-circle customers" src="{{ asset('images/customer-5.jpg') }}"
                            alt="customers">
                    </div>
                    <div class="col-12 d-flex justify-content-center col-lg-4 text-lg-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="testinomials-icons p-2 text-light rounded-circle">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="testinomials-icons p-2 text-light rounded-circle">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>

                <div class="row pt-4 text-center">
                    <p class="fw-bold">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aperiam fugiat reprehenderit deleniti
                        porro officiis voluptate nihil, qui, labore eius sequi, consectetur pariatur aliquid repellat
                        consequatur ipsum quos iusto distinctio beatae! Quaerat dolor reprehenderit assumenda voluptas aut
                        omnis id itaque.
                    </p>
                    <h3 class="fw-bold">
                        Jone Nicolas
                    </h3>
                    <h5 class="text-secondary">
                        CEO at Envato
                    </h5>
                </div>
            </div>
        </section>

        <!-- Clients section -->
        <section class="clients-section text-center bg-black py-5 mt-3 mb-2 rounded-3">
            <h6 class="section-heading text-center">POPULAR CLIENTS</h6>
            <h2 class="section-title text-white text-center pt-3 mb-5">Awesome <span class="text-danger">Clients</span>
            </h2>



            <div class="container-fluid ">
                <div class="container border-top border-bottom border-dark mb-4">
                    <div class="container d-flex justify-content-center gap-md-4 overflow-x-hidden">
                        <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-dark rounded-3">amazon
                        </div>
                        <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-dark rounded-3">slack
                        </div>
                        <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-dark rounded-3">Google
                        </div>
                        <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-dark rounded-3">Linkedin
                        </div>
                        <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-dark rounded-3">Walmart
                        </div>

                    </div>
                </div>

            </div>

        </section>

        <!-- Pricing Section -->
        <section class="pricing-section py-5 mt-3 mb-2 rounded-3">
            <div class="container">
                <h6 class="section-heading text-center">CHOOSE YOUR PLAN</h6>
                <h2 class="section-title text-black text-center mb-5">The Best <span class="text-danger">Pricing</span>
                    Plans To Get Your Best</h2>

                <div class="row">
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <h3 class="pricing-title">HOURLY BASIS</h3>
                            <p class="pricing-description">Nam libero tempore, cum soluta quo minus maxime placeat facere
                            </p>
                            <h4 class="pricing-price">$39<small>/hr</small></h4>
                            <ul class="pricing-features">
                                <li>1 Page with Elementor</li>
                                <li>Design Customization</li>
                                <li>Responsive Design</li>
                                <li>2 Plugins/Extensions</li>
                                <li>Multipage Elementor</li>
                            </ul>
                            <button class="btn btn-outline-danger w-100">Choose Plan</button>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="pricing-card featured">
                            <span class="badge bg-danger">Popular</span>
                            <h3 class="pricing-title">FREELANCING</h3>
                            <p class="pricing-description">Nam libero tempore, cum soluta quo minus maxime placeat facere
                            </p>
                            <h4 class="pricing-price">$239<small>/mo</small></h4>
                            <ul class="pricing-features">
                                <li>1 Page with Elementor</li>
                                <li>Design Customization</li>
                                <li>Responsive Design</li>
                                <li>2 Plugins/Extensions</li>
                                <li>Multipage Elementor</li>
                            </ul>
                            <button class="btn btn-danger w-100">Choose Plan</button>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="pricing-card">
                            <h3 class="pricing-title">FULL TIME</h3>
                            <p class="pricing-description">Nam libero tempore, cum soluta quo minus maxime placeat facere
                            </p>
                            <h4 class="pricing-price">$939<small>/mo</small></h4>
                            <ul class="pricing-features">
                                <li>1 Page with Elementor</li>
                                <li>Design Customization</li>
                                <li>Responsive Design</li>
                                <li>2 Plugins/Extensions</li>
                                <li>Multipage Elementor</li>
                            </ul>
                            <button class="btn btn-outline-danger w-100">Choose Plan</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section class="blog-section py-5 mt-3 mb-2 rounded-3">
            <div class="container">
                <h6 class="section-heading text-center">LATEST BLOG</h6>
                <h2 class="section-title text-black text-center mb-5">Visit <span class="text-danger">My Blog</span> And
                    Keep Your Feedback</h2>

                    @foreach($blogs as $blog)
<div class="row align-items-center mx-5 border-top border-secondary p-3">
  <div class="col-lg-7">
    <div class="px-2 d-inline-block border border-secondary rounded-pill">
      {{ $blog->created_at->format('d F, Y') }}
    </div>
    <h3 class="blog-title pt-3">{{ $blog->title }}</h3>
    <p class="blog-text">{{ \Illuminate\Support\Str::limit($blog->description, 120) }}</p>
  </div>

  <div class="col-lg-5">
    @if($blog->image)
      <img class="rounded-3" src="{{ asset('storage/' . $blog->image) }}" alt="blog-image">
    @else
      <img class="rounded-3" src="{{ asset('images/blog-image.jpg') }}" alt="blog-image">
    @endif
  </div>
</div>
@endforeach


                {{-- <div class="row align-items-center mx-5 border-top border-secondary p-3">

                    <div class="col-lg-7">
                        <div class="px-2 d-inline-block border border-secondary rounded-pill">16 November, 2023</div>
                        <h3 class="blog-title pt-3">Our Web Design & Development Process</h3>
                        <p class="blog-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>

                    </div>
                    <div class="col-lg-5">
                        <img class="rounded-3" src="{{ asset('images/blog-image.jpg') }}" alt="blog-image">
                    </div>

                </div>

                <div class="row align-items-center mx-5 border-top border-bottom border-secondary p-3">

                    <div class="col-lg-7">
                        <div class="px-2 d-inline-block border border-secondary rounded-pill">16 November, 2023</div>
                        <h3 class="blog-title pt-3">Our Web Design & Development Process</h3>
                        <p class="blog-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>

                    </div>
                    <div class="col-lg-5">
                        <img class="rounded-3" src="{{ asset('images/blog-image.jpg') }}" alt="blog-image">
                    </div>

                </div> --}}

            </div>
        </section>

        <!-- Contact Section -->
        {{-- <section class="contact-section bg-black py-5 mt-3 mb-2 rounded-3">
    <div class="container">
        <h6 class="section-heading text-center">GET IN TOUCH</h6>
        <h2 class="section-title text-white text-center">Want To <span class="text-danger">Enrich</span> Yourself, Always Connect with Us</h2>
        
        <div class="row p-3">
            <div class="col-lg-6">
                <form class="contact-form">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Your name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Your email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Send Message</button>
                </form>
            </div>
            
            <div class="col-lg-6">
                <div class="form-image">
                   <img src="{{ asset('images/form.jpg') }}" alt="form-image">
                </div>
            </div>
        </div>
    </div>
</section> --}}
    @endsection

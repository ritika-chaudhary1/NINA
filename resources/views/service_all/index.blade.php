<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Service All</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
 
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/service.css') }}" />
</head>
<body>
    <section class="header">
        <!-- Top Bar -->
        <div class="top-bar mt-2 rounded-top-3">
            <div class="container bg-black">
                <div class="row pt-3 pb-3">
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <span><i class="fas fa-phone-alt me-2"></i>(+778) 000-0665</span>
                        <span class="ms-1"><i class="fas fa-envelope me-2"></i>nina99@gmail.com</span>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                        <span>
                            Follow Me ______
                            <i class="fab fa-facebook-f ms-2"></i>
                            <i class="fab fa-twitter ms-2"></i>
                            <i class="fab fa-instagram ms-2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container rounded-3 bg-white">
                <a class="navbar-brand fs-1 ps-3 pe-5" href="#">NINA</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ps-5 gap-4 d-flex justify-content-between">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('service-all/service.html') }}">Features</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('portfolio-all/portfolio.html') }}">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Clients</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('blogs/blogs-all.html') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('contact-us/contact-us.html') }}">Contact</a></li>
                    </ul>
                    <button class="btn btn-danger ms-3">Start Project</button>
                </div>
            </div>
        </nav>

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
    <section class="clients-section text-center bg-black py-5 mt-3 mb-2 rounded-3">
        <h6 class="section-heading text-center">POPULAR CLIENTS</h6>
        <h2 class="section-title text-white text-center pt-3 mb-5">
            Awesome <span class="text-danger">Clients</span>
        </h2>

        <div class="container-fluid row border-top border-bottom border-secondary mb-4">
            <div class="container d-flex justify-content-center gap-md-4 overflow-x-hidden">
                <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-secondary rounded-3">amazon</div>
                <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-secondary rounded-3">slack</div>
                <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-secondary rounded-3">Google</div>
                <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-secondary rounded-3">Linkedin</div>
                <div class="clients-brand text-white py-5 px-5 fs-4 fw-bold border border-secondary rounded-3">Walmart</div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section py-5 mt-3 mb-2 rounded-3">
        <div class="container">
            <h6 class="section-heading text-center">CHOOSE YOUR PLAN</h6>
            <h2 class="section-title text-black text-center mb-5">
                The Best <span class="text-danger">Pricing</span> Plans To Get Your Best
            </h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h3 class="pricing-title">HOURLY BASIS</h3>
                        <p class="pricing-description">
                            Nam libero tempore, cum soluta quo minus maxime placeat facere
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
                        <p class="pricing-description">
                            Nam libero tempore, cum soluta quo minus maxime placeat facere
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
                        <p class="pricing-description">
                            Nam libero tempore, cum soluta quo minus maxime placeat facere
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
            <h2 class="section-title text-black text-center mb-5">
                Visit <span class="text-danger">My Blog</span> And Keep Your Feedback
            </h2>
            
            <div class="row align-items-center mx-5 border-top border-secondary p-3">
                <div class="col-lg-7">
                    <div class="px-2 d-inline-block border border-secondary rounded-pill">16 November, 2023</div>
                    <h3 class="blog-title pt-3">Our Web Design &amp; Development Process</h3>
                    <p class="blog-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col-lg-5">
                    <img class="rounded-3" src="{{ asset('images/blog-image.jpg') }}" alt="blog-image" />
                </div>
            </div>

            <div class="row align-items-center mx-5 border-top border-secondary p-3">
                <div class="col-lg-7">
                    <div class="px-2 d-inline-block border border-secondary rounded-pill">16 November, 2023</div>
                    <h3 class="blog-title pt-3">Our Web Design &amp; Development Process</h3>
                    <p class="blog-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col-lg-5">
                    <img class="rounded-3" src="{{ asset('images/blog-image.jpg') }}" alt="blog-image" />
                </div>
            </div>

            <div class="row align-items-center mx-5 border-top border-bottom border-secondary p-3">
                <div class="col-lg-7">
                    <div class="px-2 d-inline-block border border-secondary rounded-pill">16 November, 2023</div>
                    <h3 class="blog-title pt-3">Our Web Design &amp; Development Process</h3>
                    <p class="blog-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col-lg-5">
                    <img class="rounded-3" src="{{ asset('images/blog-image.jpg') }}" alt="blog-image" />
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-black py-5 mt-3 mb-2 rounded-3">
        <div class="container">
            <h6 class="section-heading text-center">GET IN TOUCH</h6>
            <h2 class="section-title text-white text-center">
                Want To <span class="text-danger">Enrich</span> Yourself, Always Connect with Us
            </h2>
            
            <div class="row p-3">
                <div class="col-lg-6">
                    <form class="contact-form">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your name" />
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your email" />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Subject" />
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Send Message</button>
                    </form>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-image">
                        <img src="{{ asset('images/form.jpg') }}" alt="form-image" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section class="footer pb-4 mt-3 mb-2 rounded-3">
        <div class="container-fluid rounded-top-3">
            <div class="container text-center py-2">
                <p class="fs-4 pt-1 text-white fw-bold">
                    nina99@domainname.com / 14 tottenham road, london, england / +1(0) 987654
                </p>
            </div>
        </div>
        <div class="container">
            <h1 class="mid-footer-title text-center border-bottom border-dark">LET'S WORK </h1>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <p class="mb-0 fw-bold">© 2023 <span class="text-danger">NINA</span>, ALL RIGHTS RESERVED.</p>
                </div>
                <div class="col-md-4 text-center">
                    <a href="{{ url('/') }}" class="footer-link text-dark fw-bold">BACK TO HOME</a>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="#" class="social-icon text-dark fw-bold">FACEBOOK</a>
                    <a href="#" class="social-icon text-dark fw-bold ms-3">DRIBBLE</a>
                    <a href="#" class="social-icon text-dark fw-bold ms-3">BEHANCE</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portfolio All</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
 
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}" />
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
                        <span>Follow Me ______<i class="fab fa-facebook-f ms-2"></i> <i class="fab fa-twitter ms-2"></i> <i class="fab fa-instagram ms-2"></i></span>
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
                    <h1>Portfolio</h1>
                    <p>
                        <a href="{{ url('/') }}">Home</a> /
                        <a href="{{ url('portfolio-details/portfolio.html') }}">Portfolio Details</a>
                    </p>
                </div>
            </div>
        </section>
    </section>

    <!-- Projects Section -->
    <section class="projects-section py-5 bg-light mt-3 mb-2 rounded-3">
        <div class="container">
            <div class="text-center">
                <h6 class="shadow-lg p-1 p-sm-3 mb-5 bg-body-tertiary rounded d-inline-block">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="#" class="btn btn-danger">All</a>
                        <a href="#" class="btn btn-outline-danger">Brand App</a>
                        <a href="#" class="btn btn-outline-danger">iOS App</a>
                        <a href="#" class="btn btn-outline-danger">More Page</a>
                        <a href="#" class="btn btn-outline-danger">Site</a>

                    </div>
                </h6>
            </div>

            <div class="row">
                <!-- Project 1 -->
                <div class="col-md-4">
                    <div class="project-card">
                        <img src="{{ asset('images/project-image.jpg') }}" alt="Mobile App Design" class="img-fluid" />
                        <div class="project-overlay">
                            <h3>Mobile App Design</h3>
                            <p>App Design</p>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="col-md-4">
                    <div class="project-card">
                        <img src="{{ asset('images/project-image.jpg') }}" alt="Product Design" class="img-fluid" />
                        <div class="project-overlay">
                            <h3>Product Design</h3>
                            <p>Online Product Design</p>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="col-md-4">
                    <div class="project-card">
                        <img src="{{ asset('images/project-image.jpg') }}" alt="Branding Design" class="img-fluid" />
                        <div class="project-overlay">
                            <h3>Branding Design</h3>
                            <p>Digital Agency Branding</p>
                        </div>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="col-md-4">
                    <div class="project-card">
                        <img src="{{ asset('images/project-image.jpg') }}" alt="App Landing Page" class="img-fluid" />
                        <div class="project-overlay">
                            <h3>App Landing Page</h3>
                            <p>Design</p>
                        </div>
                    </div>
                </div>

                <!-- Project 5 -->
                <div class="col-md-4">
                    <div class="project-card">
                        <img src="{{ asset('images/project-image.jpg') }}" alt="Mobile App" class="img-fluid" />
                        <div class="project-overlay">
                            <h3>Mobile App</h3>
                            <p>App Design</p>
                        </div>
                    </div>
                </div>

                <!-- Project 6 -->
                <div class="col-md-4">
                    <div class="project-card">
                        <img src="{{ asset('images/project-image.jpg') }}" alt="Apps Design" class="img-fluid" />
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

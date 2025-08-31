<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nina - WordPress Developer</title>
    <!-- Bootstrap CSS (CDN, so no change needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome (CDN, so no change needed) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <section class="header">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="container bg-black">
                <div class="row pt-3 pb-3">
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <span><i class="fas fa-phone-alt me-2"></i>(+778) 000-0665</span>
                        <span class="ms-1"><i class="fas fa-envelope me-2"></i>nina99@gmail.com</span>
                    </div>
                

                    <div class="col-12 col-md-6 text-center text-md-end">
                        <a href="#" class="text-white nav-icon"><i class="fab fa-facebook-f ms-2"></i></a>
                        <a href="#" class="text-white nav-icon"><i class="fab fa-twitter ms-2"></i></a>
                        <a href="#" class="text-white nav-icon"><i class="fab fa-instagram ms-2"></i></a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Navigation -->
       <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container rounded-3 bg-white">
        <a class="navbar-brand fs-1 ps-3 pe-5 text-black" href="#">NINA</a>
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
                <li class="nav-item"><a class="nav-link text-black" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="{{ route('service.index') }}">Features</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="{{ route('portfolios.index') }}">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="#clients">Clients</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="{{ route('blog.index') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link text-black" href="{{ route('contacts_us.index') }}">Contact</a></li>
            </ul>
            <a href="#" class="btn nav-btn border-2 text-danger border-danger rounded ms-auto mx-3">Start Project</a>
        </div>
    </div>
</nav>

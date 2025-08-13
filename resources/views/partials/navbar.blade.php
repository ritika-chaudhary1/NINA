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
        <div class="top-bar mt-2 rounded-top-3">
            <div class="container bg-black">
                <div class="row pt-3 pb-3">
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <span><i class="fas fa-phone-alt me-2"></i>(+778) 000-0665</span>
                        <span class="ms-1"><i class="fas fa-envelope me-2"></i>nina99@gmail.com</span>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
  @auth
    <!-- Show Logout form/button when logged in -->
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button type="submit" class="btn btn-danger btn-sm">Logout</button>
    </form>
  @else
    <!-- Show Login button when logged out -->
    <a href="{{ route('admin.login') }}" class="btn btn-primary btn-sm">Login</a>
  @endauth
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
                  <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
  <a class="nav-link" href="{{ route('service_all.index') }}">Features</a>

<li class="nav-item"><a class="nav-link" href="{{ route('portfolio.index') }}">Portfolio</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('clients') }}">Clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('pricing') }}">Pricing</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('blogs.index') }}">Blog</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>

                    </ul>
                    <button class="btn btn-danger ms-3">Start Project</button>
                </div>
            </div>
        </nav>
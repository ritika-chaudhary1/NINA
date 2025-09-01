<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>NINA Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
  overflow-x: hidden;
}

/* Sidebar */
#sidebar {
  width: 250px;
  min-height: 100vh;
  background: #ffffff; /* white background */
  color: #212529; /* off-black text */
  transition: width 0.3s ease;
  overflow-x: hidden;
  border-right: 1px solid #ddd;
}

#sidebar.collapsed {
  width: 70px;
}

#sidebar .nav-link {
  color: #212529; /* off-black text */
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  display: flex;
  align-items: center;
  transition: all 0.2s ease-in-out;
}

#sidebar.collapsed .nav-link span.menu-text {
  display: none;
}

#sidebar .nav-link:hover,
#sidebar .nav-link.active {
  background: #f1f1f1; /* light gray hover */
  color: #000000; /* darker black text */
}

/* #sidebar .nav-link i {
  width: 25px;
  min-width: 25px;
  text-align: center;
  margin-right: 10px;
  font-size: 18px;
  color: #212529;
} */

#sidebar .nav-link i {
  color: transparent; /* removes solid fill */
  -webkit-text-stroke: 1px #000; /* black outline */
  font-size: 18px;
  margin-right: 10px;
  min-width: 25px;
  text-align: center;
}


#sidebar.collapsed .nav-link i {
  margin-right: 0;
  font-size: 20px;
}

#sidebar .collapse-inner {
  padding-left: 35px;
}

#sidebar.collapsed .collapse-inner {
  display: none;
}

/* Content */
#content {
  transition: margin-left 0.3s ease;
  margin-left: 250px;
  padding: 20px;
  flex-grow: 1;
}
#content.expanded {
  margin-left: 70px;
}

/* Navbar */
nav.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky;
  top: 0;
  z-index: 1030;
  padding: 0 1rem;
  height: 56px;
  background: #ffffff !important; /* white navbar */
  border-bottom: 1px solid #ddd;
}

nav.navbar .navbar-brand {
  font-weight: bold;
  font-size: 1.5rem;
  color: #212529 !important; /* off-black */
  text-decoration: none;
}

nav.navbar .btn-outline-light {
  border-color: #212529;
  color: #212529;
}
nav.navbar .btn-outline-light:hover {
  background: #f1f1f1;
  color: #000;
}

.dropdown-menu {
  border: 1px solid #ddd;
}
.dropdown-item:hover {
  background: #f1f1f1;
  color: #000;
}
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
  <button id="sidebarToggle" class="btn btn-outline-light">
    <i class="fas fa-bars"></i>
  </button>

  <a href="#" class="navbar-brand">NINA</a>

  <!-- Right-side user dropdown -->
  <div class="dropdown ms-auto">
    <button class="btn btn-outline-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-user-circle me-1"></i> Admin
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
      <li>
        <a class="dropdown-item" href="{{ route('admin.profile') }}">
          <i class="fas fa-user me-2"></i> My Profile
        </a>
      </li>
      <li>
        <form action="{{ route('admin.logout') }}" method="POST" class="m-0 p-0">
          @csrf
          <button type="submit" class="dropdown-item">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
          </button>
        </form>
      </li>
    </ul>
  </div>



</nav>


  <div class="d-flex">
    <!-- Sidebar -->
    <nav id="sidebar">
      <ul class="nav flex-column pt-3">

        <li class="nav-item">
      <a class="nav-link" href="{{ route ('admin.dashboard')}}">
        <i class="fas fa-tachometer-alt"></i>
        <span class="menu-text">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route ('admin.portfolio_categories.index')}}">
        <i class="fas fa-tachometer-alt"></i>
        <span class="menu-text">Portfolio Category</span>
      </a>
    </li>

        <li class="nav-item">
      <a class="nav-link" href="#portfolioSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="portfolioSubmenu">
        <i class="fas fa-briefcase"></i>
        <span class="menu-text">Portfolio</span>
        <i class="fas fa-caret-down ms-auto"></i>
      </a>
      <div class="collapse collapse-inner ps-4" id="portfolioSubmenu">
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.portfolio_details.create')}}">Create New Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.portfolio_details.index')}}">Portfolio Details</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
  <a class="nav-link" href="#categorySubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="categorySubmenu">
    <i class="fas fa-tags"></i>
    <span class="menu-text">Blog Category</span>
    <i class="fas fa-caret-down ms-auto"></i>
  </a>
  <div class="collapse collapse-inner ps-4" id="categorySubmenu">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.blog_categories.index') }}">All Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.blog_categories.create') }}">Add New Category</a>
      </li>
    </ul>
  </div>
</li>


        <li class="nav-item">
          <a class="nav-link" href="#blogsSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="blogsSubmenu">
            <i class="fas fa-blog"></i>
            <span class="menu-text">Blogs</span>
            <i class="fas fa-caret-down ms-auto"></i>
          </a>
          <div class="collapse collapse-inner ps-4" id="blogsSubmenu">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blogs_details.create') }}">Create New Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blogs_details.index')}}">Blog Details</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#featuresSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="featuresSubmenu">
            <i class="fas fa-star"></i>
            <span class="menu-text">Services</span>
            <i class="fas fa-caret-down ms-auto"></i>
          </a>
          <div class="collapse collapse-inner ps-4" id="featuresSubmenu">
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.index') }}">Service all</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.service-categories.index') }}">Service Categories</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.service_details.index') }}">Service Details</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
  <a class="nav-link" href="#clientsSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="clientsSubmenu">
    <i class="fas fa-users"></i>
    <span class="menu-text">Clients</span>
    <i class="fas fa-caret-down ms-auto"></i>
  </a>
  <div class="collapse collapse-inner ps-4" id="clientsSubmenu">
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.clients.create') }}">Add New Client</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.clients.index') }}">All Clients</a></li>
    </ul>
  </div>
</li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.contact_us.index') }}">
            <i class="fas fa-envelope"></i>
            <span class="menu-text">Contact Us</span>
          </a>
        </li>

      </ul>
    </nav>

    <!-- Page Content -->
    <main id="content text-center" class="flex-grow-1 p-4">
      @yield('content')
    </main>
  </div>

  <!-- Bootstrap JS Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      content.classList.toggle('expanded');
    });
  </script>

</body>
</html>

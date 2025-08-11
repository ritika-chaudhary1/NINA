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
    #sidebar {
      width: 250px;
      min-height: 100vh;
      background: #343a40;
      color: white;
      transition: width 0.3s ease;
      overflow-x: hidden;
    }
    #sidebar.collapsed {
      width: 70px; /* narrow width to show icons only */
    }
    #sidebar .nav-link {
      color: #ddd;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      display: flex;
      align-items: center;
    }
    #sidebar.collapsed .nav-link span.menu-text {
      display: none; /* hide menu text when collapsed */
    }
    #sidebar .nav-link:hover, #sidebar .nav-link.active {
      background: #495057;
      color: white;
    }
    #sidebar .nav-link i {
      width: 25px; /* fixed icon width */
      min-width: 25px;
      text-align: center;
      margin-right: 10px;
      font-size: 18px;
    }
    #sidebar.collapsed .nav-link i {
      margin-right: 0;
      font-size: 20px;
    }
    #sidebar .collapse-inner {
      padding-left: 35px;
    }
    #sidebar.collapsed .collapse-inner {
      display: none; /* hide submenu text when collapsed */
    }

    #content {
      transition: margin-left 0.3s ease;
      margin-left: 250px;
      padding: 20px;
      flex-grow: 1;
    }
    #content.expanded {
      margin-left: 70px;
    }

    /* Navbar adjustments */
    nav.navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 1030;
      padding: 0 1rem;
      height: 56px;
    }
    #sidebarToggle {
      order: 1; /* first */
    }
    .navbar-brand {
      order: 2; /* second */
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      font-weight: bold;
      font-size: 1.5rem;
      color: white;
      text-decoration: none;
    }
    /* To keep right side empty or add user menu later */
    .navbar-placeholder {
      order: 3;
      width: 40px; /* same width as toggle btn for symmetry */
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
      <a class="nav-link" href="#portfolioSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="portfolioSubmenu">
        <i class="fas fa-briefcase"></i>
        <span class="menu-text">Portfolio</span>
        <i class="fas fa-caret-down ms-auto"></i>
      </a>
      <div class="collapse collapse-inner ps-4" id="portfolioSubmenu">
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link" href="#">All Portfolios</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Add New Portfolio</a></li>
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
                <a class="nav-link" href="#">All Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Add New Blog</a>
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
              <li class="nav-item"><a class="nav-link" href="#">Service all</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Service Details</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-envelope"></i>
            <span class="menu-text">Contact Us</span>
          </a>
        </li>

      </ul>
    </nav>

    <!-- Page Content -->
    <main id="content">
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

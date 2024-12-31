<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin Dashboard')</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- Bootstrap Icons -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
    rel="stylesheet"
  />
  <!-- FontAwesome (opsional) -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    rel="stylesheet"
  />

  <style>
    /* Sidebar custom styling */
    .sidebar {
      height: 100vh;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: white;
    }
    .sidebar .nav-link {
      color: white;
      font-size: 1rem;
      transition: background-color 0.3s, color 0.3s;
    }
    .sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      color: #ffffff;
    }
    .sidebar .nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
      font-weight: bold;
    }
    .sidebar .nav-link i {
      margin-right: 10px;
    }
    .sidebar .brand-logo {
      font-size: 1.5rem;
      text-align: center;
      padding: 20px 0;
      font-weight: bold;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Sembunyikan sidebar di layar kecil */
    @media (max-width: 767.98px) {
      .sidebar {
        display: none;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar Mobile (Muncul di layar kecil) -->
  <nav
    class="navbar navbar-expand-md navbar-dark d-md-none"
    style="background: linear-gradient(135deg, #6a11cb, #2575fc);"
  >
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Admin Panel
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#mobileNavbar"
        aria-controls="mobileNavbar"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mobileNavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a
              class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
              href="{{ route('dashboard') }}"
            >
              <i class="bi bi-house-door"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link {{ Request::is('admin/pengajuan*') ? 'active' : '' }}"
              href="{{ route('admin.pengajuan') }}"
            >
              <i class="bi bi-clipboard-data"></i> Pengajuan
            </a>
          </li>
          <li class="nav-item">
            <form
              method="POST"
              action="{{ route('logout') }}"
              style="display: inline;"
            >
              @csrf
              <button
                type="submit"
                class="btn btn-link nav-link text-white"
                style="text-decoration: none;"
              >
                <i class="bi bi-box-arrow-right"></i> Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END Navbar Mobile -->

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar (hanya muncul di layar menengah/besar) -->
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="position-sticky">
          <div class="brand-logo">
            Admin Panel
          </div>
          <ul class="nav flex-column mt-3">
            <li class="nav-item">
              <a
                class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                href="{{ route('dashboard') }}"
              >
                <i class="bi bi-house-door"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link {{ Request::is('admin/pengajuan*') ? 'active' : '' }}"
                href="{{ route('admin.pengajuan') }}"
              >
                <i class="bi bi-clipboard-data"></i> Pengajuan
              </a>
            </li>
            <li class="nav-item">
              <form
                method="POST"
                action="{{ route('logout') }}"
                style="display: inline;"
              >
                @csrf
                <button
                  type="submit"
                  class="btn btn-link nav-link text-white"
                  style="text-decoration: none;"
                >
                  <i class="bi bi-box-arrow-right"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
      </main>
      <!-- END Main Content -->
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  ></script>
</body>
</html>

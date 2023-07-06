<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="Themepixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">

    <title>MTM Dashboard</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="lib/remixicon/fonts/remixicon.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Penempatan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
    <!-- Penempatan script DataTables setelah jQuery -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  </head>
  <body>

    <div class="sidebar">
      <div class="sidebar-header">
        <a href="/dashboard-admin" class="sidebar-logo d-flex align-items-center">
          <img src="/img/logo.png" alt="" class="avatar me-2">
          Dashboard
        </a>
      </div><!-- sidebar-header -->
      <div id="sidebarMenu" class="sidebar-body">
        <div class="nav-group show">
          <a href="/dashboard-admin" class="nav-label">Dashboard</a>
          <ul class="nav nav-sidebar">
            <li class="nav-item">
              <a href="/dashboard-admin" class="nav-link"><i class="ri-home-3-line"></i> <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
              <a href="/location-setting" class="nav-link"><i class="ri-map-pin-3-line"></i> <span>Location Setting</span></a>
            </li>
            <li class="nav-item">
              <a href="user-setting.html" class="nav-link"><i class="ri-user-settings-line"></i> <span>User Setting</span></a>
            </li>
            <!--<li class="nav-item">
              <a href="../helpdesk-ticket-admin" class="nav-link"><i class="ri-ticket-line"></i> <span>Helpdesk Ticket</span></a>
            </li> -->
            <li class="nav-item">
              <a href="/add-user" class="nav-link"><i class="ri-user-add-line"></i> <span>Add User</span></a>
            </li>
          </ul>
        </div><!-- nav-group -->
      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="header-main px-3 px-lg-4">
      <div class="dropdown dropdown-profile ms-auto">
          <a href="" class="dropdown-link" data-bs-toggle="dropdown" data-bs-auto-close="outside"><div class="avatar online"><img src="https://via.placeholder.com/500/4c5366/fff" alt=""></div></a>
          <div class="dropdown-menu dropdown-menu-end mt-10-f">
            <div class="dropdown-menu-body">
              <div class="avatar avatar-xl online mb-3"><img src="https://via.placeholder.com/500/4c5366/fff" alt=""></div>
              <h5 class="mb-1 text-dark fw-semibold">Admin</h5>
              <p class="fs-sm text-secondary">Staff</p>
              <hr>
              <nav class="nav">
                <a href="/profile-admin"><i class="ri-user-settings-line"></i> Account</a>
                <a href="/login"><i class="ri-logout-box-r-line"></i> Log Out</a>
              </nav>
            </div><!-- dropdown-menu-body -->
          </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </div><!-- header-main -->

    <div class="main main-app p-3 p-lg-4">
      <ol class="breadcrumb fs-sm mb-2">
        <li class="breadcrumb-item"><a href="/profile-admin">Account</a></li>
        <li class="breadcrumb-item active" aria-current="page">Settings</li>
      </ol>
      <h2 class="main-title">Profile</h2>
      <div class="card card-settings">
        <div class="card-header">
          <h5 class="card-title">User Information</h5>
          <table id="location-setting" class="table table-bordered mb-0">
        </div><!-- card-header -->
        <div class="card-body p-0">
          <div class="setting-item">
            <div class="row g-2 align-items-center">
              <div class="col-md-5">
                <h6>Name</h6>
              </div><!-- col -->
              <div class="col-md">
                <input type="text" class="form-control" value="Name" id="name" name="name">
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- setting-item -->
          <div class="setting-item">
            <div class="row g-2">
              <div class="col-md-5">
                <h6>Username</h6>
              </div><!-- col -->
              <div class="col-md">
                <input type="text" class="form-control" value="Name" id="username" name="username">
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- setting-item -->
          <div class="setting-item">
            <div class="row g-2 align-items-center">
              <div class="col-md-5">
                <h6>Email</h6>
              </div><!-- col -->
              <div class="col-md">
                <input type="email" class="form-control" value="email@mail.com" id="email" name="email">
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- setting-item -->
          <div class="setting-item">
            <div class="row g-2">
              <div class="col-md-5">
                <h6>Password</h6>
              </div><!-- col -->
            <div class="col-md">
                <input type="Password" class="form-control" value="*******" id="password" name="password">
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- setting-item -->
          <div class="setting-item">
            <div class="row g-2">
              <div class="col-md-5">
                <h6>No. Telepon</h6>
              </div><!-- col -->
            <div class="col-md">
                <input type="text" class="form-control" value="0812345678" id="no_telp" name="no_telp">
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- setting-item -->
          <div class="setting-item">
            <div class="row g-2">
              <div class="col-md-5">
                <h6>Location Setting</h6>
              </div><!-- col -->
              <div class="col-md">
                <input type="text" class="form-control" value="location" id="location" name="location">
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- setting-item -->
          <div class="setting-item">
            <div class="row g-2">
              <div class="col-md-5">
                <h6>User Setting</h6>
              </div><!-- col -->
              <div class="col-md">
                <input type="email" class="form-control" value="Jakarta" id="user_setting" name="user_setting">
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- setting-item -->
        </div><!-- card-body -->
      </div><!-- card -->

      <div class="main-footer mt-5">
        <span>&copy; 2023. PT Media Telekomunikasi Mandiri. All Rights Reserved.</span>
      </div><!-- main-footer -->
    </div><!-- main -->

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/js/script.js"></script>
    <script>
      'use strict'

      // Replace button when dark is enabled
      if(skinMode) {
        $('.btn-white').each(function(){
          $(this).addClass('btn-outline-primary').removeClass('btn-white');
        });
      }
    </script>
  </body>
</html>
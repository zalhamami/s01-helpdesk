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
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">

    <title>MTM Dashboard</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../lib/remixicon/fonts/remixicon.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

    <div class="sidebar">
      <div class="sidebar-header">
        <a href="/dashboard-admin" class="sidebar-logo d-flex align-items-center">
          <img src="../img/logo.png" alt="" class="avatar me-2">
          Dashboard
        </a>
      </div><!-- sidebar-header -->
      <div id="sidebarMenu" class="sidebar-body">
        <div class="nav-group show">
          <a href="#" class="nav-label">Dashboard</a>
          <ul class="nav nav-sidebar">
            <li class="nav-item">
              <a href="/dashboard-admin" class="nav-link"><i class="ri-home-3-line"></i> <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
              <a href="/location-setting" class="nav-link"><i class="ri-map-pin-3-line"></i> <span>Location Setting</span></a>
            </li>
            <li class="nav-item">
              <a href="/user-setting" class="nav-link"><i class="ri-user-settings-line"></i> <span>User Setting</span></a>
            </li>
            <!-- <li class="nav-item">
              <a href="index-3.html" class="nav-link"><i class="ri-ticket-line"></i> <span>Helpdesk Ticket</span></a>
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
      <div class="d-md-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create User</li>
          </ol>
        </div>
      </div>

      <div class="card col-md-6">
        <div class="card-header py-3">
          <h5 class="card-title mb-0">Create Users</h5>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="form-group mb-3">
              <label class="mb-2" for="inputName">Name</label>
              <input type="text" class="form-control" id="inputName" placeholder="Enter name">
            </div>
            <div class="form-group mb-3">
              <label class="mb-2" for="inputName">User Name</label>
              <input type="text" class="form-control" id="inputName" placeholder="Enter name">
            </div>
            <div class="form-group mb-3">
              <label class="mb-2" for="inputPassword">Password</label>
              <input type="text" class="form-control" id="inputPassword" placeholder="Enter Password">
            </div>
            <div class="form-group mb-3">
              <label class="mb-2" for="inputName">Location Setting</label>
              <select class="form-select">
                <option value="1">Jakarta</option>
                <option value="2">Palembang</option>
                <option value="3">Bandung</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label class="mb-2" for="inputUser">User Setting</label>
              <select class="form-select">
                <option value="1">Teknisi</option>
                <option value="2">Admin</option>
                <option value="3">Helpdesk</option>
              </select>
            </div>
            <div class="text-end">
              <button type="reset" class="btn btn-secondary">
                Cancel
              </button>
              <button type="submit" class="btn btn-primary">
                Save
              </button>
            </div>
          </form>
        </div>
      </div>

      <div class="main-footer mt-5">
        <span>&copy; 2023. PT Media Telekomunikasi Mandiri. All Rights Reserved.</span>
      </div><!-- main-footer -->
    </div><!-- main -->


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../lib/chart.js/chart.min.js"></script>
    <script src="../lib/peity/jquery.peity.min.js"></script>

    <script src="../js/script.js"></script>
    <script src="../js/db.data.js"></script>
    <script src="../js/db.helpdesk.js"></script>

  </body>
</html>

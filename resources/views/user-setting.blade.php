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
    <link rel="shortcut icon"  href="../img/favicon.png">

    <title>MTM Dashboard</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../lib/remixicon/fonts/remixicon.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Penempatan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
    <!-- Penempatan script DataTables setelah jQuery -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> 

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
              <a href="location-setting" class="nav-link"><i class="ri-map-pin-3-line"></i> <span>Location Setting</span></a>
            </li>
            <li class="nav-item">
              <a href="/user-setting" class="nav-link"><i class="ri-user-settings-line"></i> <span>User Setting</span></a>
            </li>
            <!--<li class="nav-item">
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
                <a href="/profile-admin"><i class="ri-user-settings-line"></i> Account </a>
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
            <li class="breadcrumb-item active" aria-current="page">User Setting</li>
          </ol>
        </div>
      </div>

      <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title mb-0">User</h5>
        </div>
        @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
        @endif
        <div class="card-body">
            <a href="#modal1" class="btn btn-primary mb-3" data-bs-toggle="modal">Create New</a>
          <div class="table-responsive">
            <table id="user-setting" class="table table-bordered mb-0">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">User</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>

      <div class="main-footer mt-5">
        <span>&copy; 2023. PT Media Telekomunikasi Mandiri. All Rights Reserved.</span>
      </div><!-- main-footer -->
    </div><!-- main -->

    <div class="modal fade" id="modal1" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">User Setting</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div><!-- modal-header -->
          <div class="modal-body">
            <form action="/user-setting" method="POST">
              @csrf
              <div class="form-group mb-4">
                <label for="" class="mb-3">Create New User</label>
                <input type="text" class="form-control form-control-solid" name="user_setting" >
                </select> 
              </div>
          </div><!-- modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Save Change"/>
          </div><!-- modal-footer -->
        </form>
        </div><!-- modal-content -->
      </div><!-- modal-content -->
    </div><!-- modal -->

    <script type="text/javascript">
      $(document).ready(function() {
           $('#user-setting').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": "{{ route('getusersetting') }}",
              "columns":[
                  { "data": "id" },
                  { "data": "user_setting" },
                  ],
              "order": [[0, 'asc']], // Mengurutkan berdasarkan kolom ID secara ascending
              "columnDefs": [{
                  "targets": 0, // Mengatur kolom ID untuk berurutan
                  "orderable": true,
                  "searchable": false,
                  "render": function (data, type, row, meta) {
                      // Mengatur nomor urutan berdasarkan data di kolom ID
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
              }]
          });
      });
    </script>

    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../lib/peity/jquery.peity.min.js"></script>

    <script src="../js/script.js"></script>
    <script src="../js/db.data.js"></script>

  </body>
</html>

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
        <a href="/dashboard-helpdesk" class="sidebar-logo d-flex align-items-center">
          <img src="../img/logo.png" alt="" class="avatar me-2">
          Dashboard
        </a>
      </div><!-- sidebar-header -->
      <div id="sidebarMenu" class="sidebar-body">
        <div class="nav-group show">
          <a href="#" class="nav-label">Dashboard</a>
          <ul class="nav nav-sidebar">
            <li class="nav-item">
              <a href="/dashboard-helpdesk" class="nav-link"><i class="ri-home-3-line"></i> <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
              <a href="/helpdesk-ticket-helpdesk" class="nav-link"><i class="ri-ticket-line"></i> <span>Helpdesk Ticket</span></a>
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
              <h5 class="mb-1 text-dark fw-semibold">Helpdesk</h5>
              <p class="fs-sm text-secondary">Staff</p>
              <hr>
              <nav class="nav">
                <a href="/profile-helpdesk"><i class="ri-user-settings-line"></i> Account</a>
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
            <li class="breadcrumb-item"><a href="/dashboard-helpdesk">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Helpdesk Service</li>
          </ol>
          <h4 class="main-title mb-0">Welcome to Dashboard</h4>
        </div>
      </div>

      <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title mb-0">List of all tickets</h5>
        </div>
        @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
        @endif
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered mb-0">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Date</th>
                  <th scope="col">Nama Teknisi</th>
                  <th scope="col">Location</th>
                  <th scope="col">Description Problem</th>
                  <th scope="col">Helpdesk Solution</th>
                  <th scope="col">Action</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th rowspan="5">1</th>
                  <th rowspan="5">10-02-2023</th>
                  <td rowspan="5">Zainal Arifin</td>
                  <td rowspan="5">Jakarta</td>
                  <td id="description-problem"></td>
                  <td id="helpdesk-solution"></td>
                  <td rowspan="5">
                    <a href="#modal1" class="btn btn-primary" data-bs-toggle="modal">Eksekusi</a>
                  </td>
                  <td rowspan="5">Open</td>
                </tr>
              </tbody>
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
            <h5 class="modal-title">Aksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div><!-- modal-header -->
          <div class="modal-body">
            <form action="{{ route('helpdesk') }}" method="POST">
              @csrf
              <div class="form-group mb-4">
                <label for="pengecekan_link" class="mb-3">Pengecekan Link</label>
                <select class="form-select mb-2" name="pengecekan_link" id="pengecekan_link">
                  <option value="GSM DOWN">GSM DOWN</option>
                  <option value="GSM UP">GSM UP</option>
                </select>
                <select class="form-select" name="pengecekan_link2" id="pengecekan_link2">
                  <option value="MPLS DOWN">MPLS DOWN</option>
                  <option value="MPLS UP">MPLS UP</option>
                </select>
              </div>
              <div class="form-group mb-4">
                <label for="text" class="mb-3">Teks</label>
                <textarea input type="text" class="form-control mb-2" id="text" name="text" rows="5"></textarea>
                <label for="myCheckbox" id="check" class="mb-3">Aksi</label>
                <br>
                <input value="Periksa kembali kabel MPLS" type="checkbox" id="myCheckbox" name="myCheckbox[]">
                <label for="myCheckbox">Periksa kembali kabel MPLS</label>
                <br>
                <input value="Pengecekan link MPLS" type="checkbox" id="myCheckbox2" name="myCheckbox[]">
                <label for="myCheckbox2">Pengecekan link MPLS</label>
                <br>
                <input value="Periksa kembali Antena pada Perangkat" type="checkbox" id="myCheckbox3" name="myCheckbox[]">
                <label for="myCheckbox3">Periksa kembali Antena pada Perangkat</label>
                <br>
                <input value="Pengecekan SIM card" type="checkbox" id="myCheckbox4" name="myCheckbox[]">
                <label for="myCheckbox4">Pengecekan SIM card</label>
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

    <script>
      fetch('/get-tickets') // Ganti dengan URL endpoint yang sesuai
          .then(response => response.json())
          .then(data => {
              // Menggunakan data untuk menampilkan nilai pada kolom "Description Problem" dan "Helpdesk Solution"
              const ticket = data[0]; // Contoh: Mengambil data tiket pertama
              const descriptionProblem = ticket.description_problem;
              const helpdeskSolution = ticket.helpdesk_solution;

              // Menampilkan nilai pada kolom
              document.getElementById('description-problem').textContent = descriptionProblem;
              document.getElementById('helpdesk-solution').textContent = helpdeskSolution;
          })
          .catch(error => {
              console.error('Error:', error);
          });
  </script>

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

  </body>
</html>

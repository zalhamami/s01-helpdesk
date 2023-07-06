<x-dashboard-layout>
  <div class="d-md-flex align-items-center justify-content-between mb-4">
    <div>
      <ol class="breadcrumb fs-sm mb-1">
        <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Helpdesk Service</li>
      </ol>
      <h4 class="main-title mb-0">Welcome to Dashboard</h4>
    </div>
  </div>

  <div class="card">
    <div class="card-header py-3">
      <h5 class="card-title mb-0">List of all tickets</h5>
    </div>
    <div class="card-body">
      <form action="#" class="mb-3">
        <div class="d-flex">
          <select class="form-select w-auto">
            <option value="1">Open</option>
            <option value="2">Closed</option>
            <option value="3">Date</option>
          </select>
          <button class="btn btn-primary ms-2">
            Filter
          </button>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Date</th>
              <th scope="col">Nama Teknisi</th>
              <th scope="col">Location</th>
              <th scope="col">Description Problem</th>
              <th scope="col">Helpdesk Analisis</th>
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
              <td>Kode Store ABCD link GSM dan MPLS Down, Mohon bantuan pengecekan</td>
              <td>
                <ul>Periksa kembali kabel MPLS</ul>
                <ul>Pengecekan link MPLS</ul>
                <ul>Periksa kembali Antena pada Perangkat</ul>
                <ul>Pengecekan SIM card</ul>
              </td>
              <td rowspan="5">Eksekusi</td>
              <td rowspan="5">Open</td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-dashboard-layout>

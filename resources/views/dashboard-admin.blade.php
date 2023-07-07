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
      <a href="#createModal" class="btn btn-primary mb-3" data-bs-toggle="modal">
        Create New
      </a>
      
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
        <table id="ticket" class="table table-bordered mb-0">
          <thead>
            <tr>
              <th scope="col" width="5%">No</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Check Link 1</th>
              <th scope="col">Check Link 2</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Aksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div><!-- modal-header -->
        <form action="{{ route('ticket.store') }}" method="POST">
          <div class="modal-body">
            @csrf
            <div class="form-group mb-4">
              <label for="pengecekan_link" class="mb-3">Pengecekan Link</label>
              <select class="form-select mb-2" name="check_link_1" id="check_link_1">
                <option value="GSM DOWN">GSM DOWN</option>
                <option value="GSM UP">GSM UP</option>
              </select>
              <select class="form-select" name="check_link_2" id="check_link_2">
                <option value="MPLS DOWN">MPLS DOWN</option>
                <option value="MPLS UP">MPLS UP</option>
              </select>
            </div>
            <div class="form-group mb-4">
              <label for="text" class="mb-3">Judul</label>
              <input type="text" class="form-control mb-2" id="text" name="name">
            </div>

            <div class="form-group mb-4">
              <label for="text" class="mb-3">Deskripsi</label>
              <textarea input type="text" class="form-control mb-2" id="text" name="description" rows="5"></textarea>
            </div>

            <div class="form-group">
              <label for="myCheckbox" id="check" class="mb-3">Aksi</label>              
              @foreach ($actions as $action)
                <div class="mb-2">
                  <input value="{{ $action->id }}" type="checkbox" id="action-{{ $action->id }}" name="actions[]">
                  <label for="action-{{ $action->id }}">
                    {{ $action->name }}
                  </label>
                </div>
              @endforeach
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

  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
        $('#ticket').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": "{{ route('ticket.data') }}",
          "columns":[
            { "data": "id" },
            { "data": "name" },
            { "data": "description" },
            { "data": "check_link_1" },
            { "data": "check_link_2" },
            { "data": "created_at" },
            { "data": "updated_at" },
          ]
        });
      });
    </script>
  @endpush
</x-dashboard-layout>

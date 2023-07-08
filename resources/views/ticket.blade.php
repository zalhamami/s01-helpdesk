@php
$role = auth()->user()->user_setting->name;

$breadcrumbs = [
  ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => false],
  ['label' => 'Helpdesk Ticket', 'route' => null, 'active' => true],
];
@endphp

<x-dashboard-layout>
  <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

  <div class="card">
    <div class="card-header py-3">
      <h5 class="card-title mb-0">List of all tickets</h5>
    </div>
    <div class="card-body">
      <x-response-message />
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
              <th scope="col">Date</th>
              <th scope="col">Helpdesk</th>
              <th scope="col">Title</th>
              {{-- <th scope="col">Description</th> --}}
              <th scope="col">Check Link 1</th>
              <th scope="col">Check Link 2</th>
              {{-- <th scope="col">Actions</th> --}}
              <th scope="col">Status</th>
              <th scope="col">Technician</th>
              <th scope="col"></th>
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
        </div>
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Save Change"/>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="assignTechnicianModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Assign Technician</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('ticket.assignTechnician') }}" method="POST">
          <div class="modal-body">
            @csrf
            <input type="hidden" id="ticket-technician-id" name="ticket_id" value="">
            <div class="form-group mb-3">
              <label class="mb-2" for="user_setting">Technician</label>
              <select class="form-select" name="technician_id">
                @foreach ($technicians as $technician)
                  <option value="{{ $technician->id }}">
                    {{ $technician->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Save Change"/>
          </div>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
        $('#ticket').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": "{{ $role == 'Helpdesk' ? route('ticket.data-helpdesk') : route('ticket.data-technician') }}",
          "columns":[
            { "data": "id" },
            { "data": "created_at" },
            {
              "data": "helpdesk" ,
              "render": function(data, type, row) {
                return data.name;
              },
            },
            { "data": "name" },
            // { "data": "description" },
            { "data": "check_link_1" },
            { "data": "check_link_2" },
            // { 
            //   "data": "actions",
            //   "render": function(data, type, row) {
            //     if (data.length == 0) return '-';

            //     let html = '<ul style="margin-left: 1rem">';
            //     data.forEach(function(item) {
            //       html += '<li>' + item.action.name + '</li>';
            //     });
            //     html += '</ul>';

            //     return html;
            //   }
            // },
            { "data": "status" },
            {
              "data": "technician" ,
              "render": function(data, type, row) {
                if (data == null) return '-';
                return data.name;
              },
            },
            { 
              "data": null,
              "render": function(data, type, row) {
                let html = '<div class="btn-group" role="group">';
                if (!data.technician) {
                  html += '<a href="#assignTechnicianModal" data-bs-toggle="modal"><button class="btn btn-secondary btn-sm" onclick="assignTechnician(' + data.id + ')">Assign Technician</button></a>';
                }
                html += '<button class="btn btn-primary btn-sm" onclick="editRow(' + data.id + ')">View</button>';
                html += '<button class="btn btn-danger btn-sm" onclick="deleteRow(' + data.id + ')">Delete</button>';
                html += '</div>';
                return html;
              }
            },
          ]
        });
      });

      function assignTechnician(id) {
        const ticketTechnicianId = document.getElementById('ticket-technician-id');
        ticketTechnicianId.value = id;
      }

      function editRow(id) {
        window.location.href = `/ticket/${id}/detail`;
      }

      function deleteRow(id) {
        // Handle the delete action for the corresponding row
        console.log('Delete row:', id);
      }
    </script>
  @endpush
</x-dashboard-layout>
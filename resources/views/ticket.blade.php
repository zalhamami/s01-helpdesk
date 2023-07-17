@php
$role = auth()->user()->user_setting->name;
$isTechnician = $role == 'Teknisi';

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
      
      <form id="filterForm" action="#" class="mb-3">
        <div class="d-flex">
          <select id="filterSelect" class="form-select w-auto">
            <option value="">All</option>
            <option value="open">Open</option>
            <option value="solved">Solved</option>
            <option value="closed">Closed</option>
          </select>
          <input type="text" id="filterDate" class="form-select w-auto ms-2" placeholder="Select Date" readonly>
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
              <th scope="col" width="100">Date</th>
              <th scope="col" width="100">Closed Date</th>
              <th scope="col">Helpdesk</th>
              <th scope="col">Store Location</th>
              <th scope="col" width="300">Description</th>
              <th scope="col" width="300">Helpdesk Solution</th>
              <th scope="col">Status</th>
              <th scope="col">Technician</th>
              <th scope="col">Technician Action</th>
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
          <h5 class="modal-title">Create a Ticket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('ticket.store') }}" method="POST">
          <div class="modal-body">
            @csrf
            <div class="form-group mb-4">
              <label for="pengecekan_link" class="mb-3">Check Link</label>
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
              <label for="text" class="mb-3">Store Location</label>
              <select class="form-select" name="location">
                @foreach ($locations as $location)
                <option value="{{ $location->id }}">
                  {{ $location->name }}</option>
                @endforeach
              </select> 
            </div>

            <div class="form-group mb-4">
              <label for="text" class="mb-3">Description</label>
              <textarea input type="text" class="form-control mb-2" id="text" name="description" rows="5"></textarea>
            </div>

            <div class="form-group">
              <label for="myCheckbox" id="check" class="mb-3">Helpdesk Solution</label>              
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
            <input type="submit" class="btn btn-primary" value="Save Changes"/>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Ticket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('ticket.update') }}" method="POST">
          <div class="modal-body">
            <h5 id="ticket_code" class="mb-4"></h5>
            @csrf
            <input type="hidden" id="update_id" name="ticket_id">
            <div class="form-group mb-4">
              <label for="pengecekan_link" class="mb-3">Link Check</label>
              <select class="form-select mb-2" name="check_link_1" id="update_check_link_1" {{ $isTechnician ? 'disabled' : '' }}>
                <option value="GSM DOWN">GSM DOWN</option>
                <option value="GSM UP">GSM UP</option>
              </select>
              <select class="form-select" name="check_link_2" id="update_check_link_2" {{ $isTechnician ? 'disabled' : '' }}>
                <option value="MPLS DOWN">MPLS DOWN</option>
                <option value="MPLS UP">MPLS UP</option>
              </select>
            </div>
            <div class="form-group mb-4">
              <label for="text" class="mb-3">Store Location</label>
              <select class="form-select" name="location" id="update_location" {{ $isTechnician ? 'disabled' : '' }}>
                @foreach ($locations as $location)
                <option value="{{ $location->id }}">
                  {{ $location->name }}</option>
                @endforeach
              </select> 
            </div>

            <div class="form-group mb-4">
              <label for="text" class="mb-3">Description</label>
              <textarea input type="text" class="form-control mb-2" id="update_description" name="description" rows="5" {{ $isTechnician ? 'disabled' : '' }}></textarea>
            </div>

            <div class="form-group">
              <label for="myCheckbox" id="check" class="mb-3">Helpdesk Solution</label>              
              <div id="update_action_list"></div>
            </div>

            @if($isTechnician)
            <div class="form-group mb-4">
              <label for="text" class="mb-3">Technician Action</label>
              <textarea input type="text" class="form-control mb-2" id="update_solution" name="solution" rows="5" required></textarea>
            </div>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Update"/>
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
      const role = '{{ $role }}';
      const isTechnician = role == 'Teknisi';
      const isHelpdesk = role == 'Helpdesk';
      
      $(document).ready(function() {
        const requestUrl = "{{ $role == 'Helpdesk' ? route('ticket.data-helpdesk') : route('ticket.data-technician') }}";
        const datatable = $('#ticket').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": requestUrl,
          "columns": [
            { 
              "data": null,
              "render": function (data, type, row, meta) {
                return meta.row + 1;
              }
            },
            { "data": "created_at" },
            { "data": "closed_at" },
            {
              "data": "helpdesk" ,
              "render": function(data, type, row) {
                return data.name;
              },
            },
            {
              "data": "location" ,
              "render": function(data, type, row) {
                return data.name;
              },
            },
            { "data": "description" },
            { 
              "data": "actions",
              "render": function(data, type, row) {
                if (data.length == 0) return '-';

                let html = '<ul style="margin-left: 1rem">';
                data.forEach(function(item) {
                  html += '<li>' + item.action.name + '</li>';
                });
                html += '</ul>';

                return html;
              }
            },
            { "data": "status" },
            {
              "data": "technician" ,
              "render": function(data, type, row) {
                if (data == null) return '-';
                return data.name;
              },
            },
            {
              "data": "solution" ,
              "render": function(data, type, row) {
                if (data == null) return '-';
                return data;
              },
            },
            { 
              "data": null,
              "render": function(data, type, row) {
                let html = '<div class="btn-group" role="group">';

                if (!data.technician) {
                  html += '<a href="#assignTechnicianModal" data-bs-toggle="modal"><button class="btn btn-secondary btn-sm" onclick="assignTechnician(' + data.id + ')">Assign</button></a>';
                }

                if (data.status != 'closed') {
                  html += '<a href="#editModal" data-bs-toggle="modal"><button class="btn btn-warning btn-sm" onclick="editRow(' + data.id + ')">Edit</button></a>';
                }

                if (isTechnician && data.status == 'open') {
                  html += '<button class="btn btn-primary btn-sm" onclick="solveTicket(' + data.id + ')">Solve</button>';
                }

                if (isHelpdesk && data.status == 'solved') {
                  html += '<button class="btn btn-danger btn-sm" onclick="closeTicket(' + data.id + ')">Close</button>';
                }

                // html += '<button class="btn btn-danger btn-sm" onclick="deleteRow(' + data.id + ')">Delete</button>';
                html += '</div>';
                return html;
              }
            },
          ]
        });

        $('#filterDate').datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true
        });

        $('#filterForm').on('submit', function(event) {
          event.preventDefault();
          var selectedStatus = $('#filterSelect').val();
          var date = $('#filterDate').val();

          let requestFilterUrl = `${requestUrl}?`;
          
          if (selectedStatus) {
            requestFilterUrl += `status=${selectedStatus}`;
          }
          
          if (date) {
            requestFilterUrl += `&date=${date}`;
          }

          datatable.ajax.url(requestFilterUrl).load();
        });
      });

      function assignTechnician(id) {
        const ticketTechnicianId = document.getElementById('ticket-technician-id');
        ticketTechnicianId.value = id;
      }

      function closeTicket(id) {
        if (confirm('Are you sure you want to close this ticket?')) {
          window.location.href = '/ticket/' + id + '/close';
        }
      }

      function solveTicket(id) {
        if (confirm('Are you sure you want to solve this ticket?')) {
          window.location.href = '/ticket/' + id + '/solve';
        }
      }

      async function editRow(id) {
        const ticketCode = document.getElementById('ticket_code');
        const ticketId = document.getElementById('update_id');
        const ticketLocation = document.getElementById('update_location');
        const ticketDescription = document.getElementById('update_description');
        const ticketSolution = document.getElementById('update_solution');
        const ticketActionList = document.getElementById('update_action_list');
        const ticketCheckLink = document.getElementById('update_check_link_1');
        const ticketCheckLink2 = document.getElementById('update_check_link_2');

        const response = await fetch(`/api/ticket/${id}`);
        const currentTicket = await response.json();

        console.info(currentTicket);
        ticketCode.innerHTML = 'Code: ' + currentTicket.code;
        ticketId.value = currentTicket.id;
        ticketLocation.value = currentTicket.location_id;
        ticketDescription.value = currentTicket.description;
        ticketCheckLink.value = currentTicket.check_link_1;
        ticketCheckLink2.value = currentTicket.check_link_2;

        if (ticketSolution) {
          ticketSolution.value = currentTicket.solution;
        }

        let helpdeskSolution = '<ul>';
        currentTicket.actions.forEach((item) => {
          helpdeskSolution += `<li>${item.action.name}</li>`;
        });
        helpdeskSolution += '</ul>';
        console.info(helpdeskSolution);
        ticketActionList.innerHTML = helpdeskSolution;
      }

      function deleteRow(id) {
        if (confirm('Are you sure want to delete this ticket?') == false) return;
        window.location.href = `/ticket/${id}/delete`;
      }
    </script>
  @endpush
</x-dashboard-layout>
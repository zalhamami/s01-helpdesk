@php
$breadcrumbs = [
  ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => false],
  ['label' => 'Dashboard', 'route' => null, 'active' => true],
];
@endphp

<x-dashboard-layout>
  <x-breadcrumbs title="Welcome to the Dashboard" :breadcrumbs="$breadcrumbs" />

  <div class="card">
    <div class="card-header py-3">
      <h5 class="card-title mb-0">List of all tickets</h5>
    </div>
    <div class="card-body">
      <form id="filterForm" action="#" class="mb-3">
        <div class="d-flex">
          <select id="filterSelect" class="form-select w-auto">
            <option value="open">Open</option>
            <option value="solved">Solved</option>
            <option value="closed">Closed</option>
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
              <th scope="col" width="100">Date</th>
              <th scope="col">Helpdesk</th>
              <th scope="col">Location</th>
              <th scope="col" width="300">Description</th>
              <th scope="col" width="300">Helpdesk Solution</th>
              <th scope="col">Status</th>
              <th scope="col">Technician</th>
              <th scope="col"></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
        const requestUrl = "{{ route('ticket.data') }}";
        const datatable = $('#ticket').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": requestUrl,
          "columns":[
            { "data": "id" },
            { "data": "created_at" },
            {
              "data": "helpdesk" ,
              "render": function(data, type, row) {
                return data.name;
              },
            },
            {
              "data": "helpdesk" ,
              "render": function(data, type, row) {
                return data.location.name;
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
          ]
        });

        $('#filterForm').on('submit', function(event) {
          event.preventDefault();
          var selectedStatus = $('#filterSelect').val();
          // Update the datatable's AJAX URL with the selected status
          datatable.ajax.url(`${requestUrl}?status=${selectedStatus}`).load();
        });
      });
    </script>
  @endpush
</x-dashboard-layout>

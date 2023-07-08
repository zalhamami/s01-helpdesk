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
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
        $('#ticket').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": "{{ route('ticket.data') }}",
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
          ]
        });
      });
    </script>
  @endpush
</x-dashboard-layout>

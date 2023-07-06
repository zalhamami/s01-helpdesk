@php
$breadcrumbs = [
  ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => false],
  ['label' => 'Location Setting', 'route' => null, 'active' => true],
];
@endphp

<x-dashboard-layout>
  <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

  <div class="card">
    <div class="card-header py-3">
      <h5 class="card-title mb-0">Location</h5>
    </div>

    <div class="card-body">
      <x-response-message />
      <a href="#createModal" class="btn btn-primary mb-3" data-bs-toggle="modal">
        Create New
      </a>
      <div class="table-responsive">
        <table id="location-setting" class="table table-bordered mb-0">
          <thead>
            <tr>
              <th scope="col" width="5%">No</th>
              <th scope="col" width="50%">Location</th>
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
          <h5 class="modal-title">Create New Location</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/location-setting" method="POST">
            @csrf
            <div class="form-group mb-4">
              <label for="" class="mb-3">Location</label>
              <input type="text" class="form-control form-control-solid" name="location" >
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
        $('#location-setting').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": "{{ route('location.data') }}",
          "columns":[
            { "data": "id" },
            { "data": "location" },
            { "data": "created_at" },
            { "data": "updated_at" },
          ]
        });
      });
    </script>
  @endpush
</x-dashboard-layout>

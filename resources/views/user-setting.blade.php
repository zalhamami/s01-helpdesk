@php
$breadcrumbs = [
  ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => false],
  ['label' => 'User Setting', 'route' => null, 'active' => true],
];
@endphp

<x-dashboard-layout>
  <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

  <div class="card">
    <div class="card-header py-3">
      <h5 class="card-title mb-0">User</h5>
    </div>
    
    <div class="card-body">
      <x-response-message />
      <a href="#createModal" class="btn btn-primary mb-3" data-bs-toggle="modal">
        Create New
      </a>
      <div class="table-responsive">
        <table id="user-setting" class="table table-bordered mb-0">
          <thead>
            <tr>
              <th scope="col" width="5%">No</th>
              <th scope="col" width="50%">User Setting</th>
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
          <h5 class="modal-title">User Setting</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('user-setting.store') }}" method="POST">
          <div class="modal-body">
            @csrf
            <div class="form-group mb-4">
              <label for="" class="mb-3">Create New User Setting</label>
              <input type="text" class="form-control form-control-solid" name="user_setting" required>
              </select> 
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
          <h5 class="modal-title">User Setting</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('user-setting.update') }}" method="POST">
          <div class="modal-body">
            @csrf
            <input type="hidden" id="update_id" name="id">
            <div class="form-group mb-4">
              <label for="" class="mb-3">Update User Setting</label>
              <input type="text" class="form-control form-control-solid" id="update_name" name="user_setting" required>
              </select> 
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

  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
        $('#user-setting').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": "{{ route('user-setting.data') }}",
          "columns":[
            { "data": "id" },
            { "data": "name" },
            {
              "data": null,
              "render": function (data, type, row) {
                let html = '<div class="btn-group" role="group">';
                html += '<a href="#editModal" data-bs-toggle="modal"><button class="btn btn-primary btn-sm" onclick="editRow(' + data.id + ')">Edit</button></a>';
                html += '<button class="btn btn-danger btn-sm" onclick="deleteRow(' + data.id + ')">Delete</button>';
                html += '</div>';
                return html;
              }
            }
          ],
        });
      });

      async function editRow(id) {
        const updateId = document.getElementById('update_id');
        const updateName = document.getElementById('update_name');

        const response = await fetch(`/api/user-setting/${id}`);
        const result = await response.json();

        updateId.value = result.id;
        updateName.value = result.name;
      }

      function deleteRow(id) {
        if (confirm('Are you sure want to delete this data?') == false) return;
        window.location.href = `/user-setting/${id}/delete`;
      }
    </script>
  @endpush
</x-dashboard-layout>

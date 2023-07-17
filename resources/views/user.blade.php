@php
$breadcrumbs = [
  ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => false],
  ['label' => 'Add User', 'route' => null, 'active' => true],
];
@endphp

<x-dashboard-layout>
  <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

  <div class="card">
    <div class="card-header py-3">
      <h5 class="card-title mb-0">List of all Users</h5>
    </div>
    
    <div class="card-body">
      <x-response-message />
      <a href="#createModal" class="btn btn-primary mb-3" data-bs-toggle="modal">Create New</a>
      <div class="table-responsive">
        <table id="add-user" class="table table-bordered mb-0">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Location Setting</th>
              <th scope="col">User Setting</th>
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
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div><!-- modal-header -->

        <div class="card col-md-12">
          <div class="card-header py-3">
            <h6 class="card-title mb-0">Create Users</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
              @csrf
              <div class="form-group mb-3">
                <label class="mb-2" for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="phone">No. Telepon</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter No. Telepon" name="phone" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="location">Location Setting</label>
                <select class="form-select" name="location">
                    @foreach ($locations as $location)
                    <option value="{{ $location->id }}">
                        {{ $location->name }}</option>
                    @endforeach
                </select>  
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="user_setting">User Setting</label>
                <select class="form-select" name="user_setting">
                  @foreach ($user_settings as $user_setting)
                    <option value="{{ $user_setting->id }}">
                        {{ $user_setting->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="text-end mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Add User"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div><!-- modal-header -->

        <div class="card col-md-12">
          <div class="card-header py-3">
            <h6 class="card-title mb-0">Create Users</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('user.update') }}" method="POST">
              @csrf
              <input type="hidden" id="update_id" name="id">
              <div class="form-group mb-3">
                <label class="mb-2" for="name">Name</label>
                <input type="text" class="form-control" id="update_name" placeholder="Enter Name" name="name" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="username">Username</label>
                <input type="text" class="form-control" id="update_username" placeholder="Enter Username" name="username" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="email">Email</label>
                <input type="text" class="form-control" id="update_email" placeholder="Enter Email" name="email" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="password">Password</label>
                <input type="password" class="form-control" id="update_password" placeholder="Enter Password" name="password">
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="phone">No. Telepon</label>
                <input type="text" class="form-control" id="update_phone" placeholder="Enter No. Telepon" name="phone" required>
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="location">Location Setting</label>
                <select class="form-select" id="update_location" name="location">
                    @foreach ($locations as $location)
                    <option value="{{ $location->id }}">
                        {{ $location->name }}</option>
                    @endforeach
                </select>  
              </div>
              <div class="form-group mb-3">
                <label class="mb-2" for="user_setting">User Setting</label>
                <select class="form-select" id="update_user" name="user_setting">
                  @foreach ($user_settings as $user_setting)
                    <option value="{{ $user_setting->id }}">
                        {{ $user_setting->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="text-end mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Save Changes"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
        $('#add-user').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": "{{ route('user.data') }}",
          "columns":[
            { 
              "data": null,
              "render": function (data, type, row, meta) {
                return meta.row + 1;
              }
            },
            { "data": "name" },
            { "data": "username" },
            { "data": "email" },
            { "data": "phone" },
            {
              "data": "location" ,
              "render": function(data, type, row) {
                return data.name;
              },
            },
            {
              "data": "user_setting" ,
              "render": function(data, type, row) {
                return data.name;
              },
            },
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
          ]
        });
      });

      async function editRow(id) {
        const updateId = document.getElementById('update_id');
        const updateName = document.getElementById('update_name');
        const updateUsername = document.getElementById('update_username');
        const updateEmail = document.getElementById('update_email');
        const updatePhone = document.getElementById('update_phone');
        const updateLocation = document.getElementById('update_location');
        const updateUser = document.getElementById('update_user');

        const response = await fetch(`/api/user/${id}`);
        const result = await response.json();

        updateId.value = result.id;
        updateName.value = result.name;
        updateUsername.value = result.username;
        updateEmail.value = result.email;
        updatePhone.value = result.phone;
        updateLocation.value = result.location_id;
        updateUser.value = result.user_setting_id;
      }

      function deleteRow(id) {
        if (confirm('Are you sure want to delete this data?') == false) return;
        window.location.href = `/user/${id}/delete`;
      }
    </script>
  @endpush
</x-dashboard-layout>
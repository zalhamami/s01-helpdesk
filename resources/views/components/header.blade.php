@php
$user = auth()->user();
$role = $user->user_setting->name;
@endphp

<div class="header-main px-3 px-lg-4">
  <div class="dropdown dropdown-profile ms-auto">
      <a href="" class="dropdown-link" data-bs-toggle="dropdown" data-bs-auto-close="outside"><div class="avatar online"><img src="https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png" alt=""></div></a>
      <div class="dropdown-menu dropdown-menu-end mt-10-f">
        <div class="dropdown-menu-body">
          <div class="avatar avatar-xl online mb-3"><img src="https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png" alt=""></div>
          <h5 class="mb-1 text-dark fw-semibold">{{ $user->name}}</h5>
          <p class="fs-sm text-secondary">{{ $role }}</p>
          <hr>
          <nav class="nav">
            <a href="{{ route('user.profile') }}"><i class="ri-user-settings-line"></i> Account Settings</a>
            <a href="{{ route('logout') }}"> <i class="ri-logout-box-r-line"></i>Logout</a>
          </nav>
        </div>
      </div>
  </div>
</div>

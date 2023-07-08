@php
$role = auth()->user()->user_setting->name;
@endphp

<div class="sidebar">
  <div class="sidebar-header">
    <a href="{{ route('dashboard') }}" class="sidebar-logo d-flex align-items-center">
      <img src="../img/logo.png" alt="" class="avatar me-2">
      Dashboard
    </a>
  </div>
  <div id="sidebarMenu" class="sidebar-body">
    <div class="nav-group show">
      <a href="{{ route('dashboard') }}" class="nav-label">Dashboard</a>
      <ul class="nav nav-sidebar">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="ri-home-3-line"></i> <span>Dashboard</span></a>
        </li>
        @if($role == 'Admin')
          <li class="nav-item">
            <a href="{{ route('location.index') }}" class="nav-link"><i class="ri-map-pin-3-line"></i> <span>Location Setting</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user-setting.index') }}" class="nav-link"><i class="ri-user-settings-line"></i> <span>User Setting</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link"><i class="ri-user-add-line"></i> <span>Add User</span></a>
          </li>
        @else
          <li class="nav-item">
            <a href="{{ route('ticket.index') }}" class="nav-link"><i class="ri-map-pin-3-line"></i> <span>Helpdesk Ticket</span></a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</div>

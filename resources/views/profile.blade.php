@php
$breadcrumbs = [
  ['label' => 'Account', 'route' => 'user.profile', 'active' => false],
  ['label' => 'Setting', 'route' => null, 'active' => true],
];

$user = auth()->user();
$role = $user->user_setting->name;
@endphp

<x-dashboard-layout>
  <x-breadcrumbs title="User Profile" :breadcrumbs="$breadcrumbs" />

  <div class="card card-settings">
    <div class="card-header">
      <h5 class="card-title">User Information</h5>
      <table id="location-setting" class="table table-bordered mb-0">
    </div><!-- card-header -->
    <div class="card-body p-0">
      <div class="mt-4">
        <x-response-message />
      </div>
      
      <form action="{{ route('user.update') }}" method="POST">
        @csrf
        <div class="setting-item">
          <div class="row g-2 align-items-center">
            <div class="col-md-5">
              <h6>Name</h6>
            </div><!-- col -->
            <div class="col-md">
              <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name" required disabled>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- setting-item -->
        <div class="setting-item">
          <div class="row g-2">
            <div class="col-md-5">
              <h6>Username</h6>
            </div><!-- col -->
            <div class="col-md">
              <input type="text" class="form-control" value="{{ $user->username }}" id="username" name="username" required disabled>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- setting-item -->
        <div class="setting-item">
          <div class="row g-2 align-items-center">
            <div class="col-md-5">
              <h6>Email</h6>
            </div><!-- col -->
            <div class="col-md">
              <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email" required>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- setting-item -->
        <div class="setting-item">
          <div class="row g-2">
            <div class="col-md-5">
              <h6>Password</h6>
            </div><!-- col -->
          <div class="col-md">
              <input type="Password" class="form-control" value="" id="password" name="password">
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- setting-item -->
        <div class="setting-item">
          <div class="row g-2">
            <div class="col-md-5">
              <h6>No. Telepon</h6>
            </div><!-- col -->
            <div class="col-md">
              <input type="text" class="form-control" value="{{ $user->phone }}" id="phone" name="phone" required>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- setting-item -->
        <div class="setting-item">
          <div class="row g-2">
            <div class="col-md-5">
              <h6>Location Setting</h6>
            </div><!-- col -->
            <div class="col-md">
              <select class="form-select" name="location_id" value="{{ $user->location_id }}" disabled>
                @foreach ($locations as $location)
                <option value="{{ $location->id }}">
                  {{ $location->name }}
                </option>
                @endforeach
              </select>  
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- setting-item -->
        <div class="setting-item">
          <div class="row g-2">
            <div class="col-md-5">
              <h6>User Setting</h6>
            </div><!-- col -->
            <div class="col-md">
              <select class="form-select" name="user_setting_id" value="{{ $user->user_setting_id }}" disabled>
                @foreach ($userSettings as $userSetting)
                <option value="{{ $userSetting->id }}">
                  {{ $userSetting->name }}
                </option>
                @endforeach
              </select>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- setting-item -->
        <div class="section-item">
          <div class="row g-2">
            <div class="col-md-5">
            </div>
            <div class="col-md">
              <button class="btn btn-primary">
                Update Profile
              </button>
            </div>
          </div>
        </div>
      </form>
    </div><!-- card-body -->
  </div><!-- card -->
</x-dashboard-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Helpdesk app">
    <meta name="author" content="User">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">
    
    <title>MTM Dashboard</title>

    <link rel="stylesheet" href="{{ asset('lib/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
  </head>
  <body>
    <x-sidebar />

    <x-header />

    <div class="main main-app p-3 p-lg-4">
      {{ $slot }}

      <div class="main-footer mt-5">
        <span>&copy; 2023. PT Media Telekomunikasi Mandiri. All Rights Reserved.</span>
      </div>
    </div>
    
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')
  </body>
</html>

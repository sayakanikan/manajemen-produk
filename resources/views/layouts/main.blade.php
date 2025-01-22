<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- @if(Session::has('download.in.the.next.request'))
      <meta http-equiv="refresh" content="5;url={{ Session::get('download.in.the.next.request') }}" target='_blank'>
  @endif --}}
  <title>Product Management System | {{ $title }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../template/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../template/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../template/images/jateng.png" />
</head>
<body>

  <div class="container-scroller">
    @include('layouts/navbar')
    <div class="container-fluid page-body-wrapper">
      @include('layouts/sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layouts/footer')
      </div>
    </div>
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../template/vendors/chart.js/Chart.min.js"></script>
  <script src="../../template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../template/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../template/js/off-canvas.js"></script>
  <script src="../../template/js/hoverable-collapse.js"></script>
  <script src="../../template/js/template.js"></script>
  <script src="../../template/js/settings.js"></script>
  <script src="../../template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../template/js/dashboard.js"></script>
  <script src="../../template/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>


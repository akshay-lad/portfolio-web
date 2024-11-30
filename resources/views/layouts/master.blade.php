<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- flash-messages -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ends flash-message -->

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Delete icon and css -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Delete End -->
    
  <!-- collapse -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
   <!-- edit and delete icon -->
   <!-- <link href="font/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- end -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/')}}assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/simple-datatables/style.css" rel="stylesheet">   

  <!--Main CSS File -->
  <link href="{{ asset('/')}}assets/css/style.css" rel="stylesheet">
  
    <style type="text/css">
        #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.75) url('https://icons8.com/preloaders/preloaders/1488/Iphone-spinner-2.gif') no-repeat center;
            z-index: 5000;
        }
    </style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.header')
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.sidebar')
<!-- End Sidebar-->

  <main id="main" class="main">
  @include('layouts.flash-message')
  @yield('content')
   
  </main>
  <!-- End #main -->
  
  <!-- ======= Footer ======= -->
  @include('layouts.footer')
<!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="{{ asset('/')}}assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('/')}}assets/vendor/quill/quill.min.js"></script>
  <script src="{{ asset('/')}}assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('/')}}assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('/')}}assets/vendor/chart.js/chart.min.js"></script>
  <script src="{{ asset('/')}}assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('/')}}assets/vendor/echarts/echarts.min.js"></script>

  <!--  Main JS File -->
  <script src="{{ asset('/')}}assets/js/main.js"></script>

   <!-- Delete -->
  <script src="{{ asset('/')}}assets/js/delete.js"></script>

  <!-- delete alert message -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script>
    var spinner = $('#loader');
    $(function() {
      $("#submit").click(function(){
        spinner.show();
      });
    });
</script>
</html>
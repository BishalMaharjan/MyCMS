<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Editor Panel of AUXFIN News Portal </title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('/editor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('/editor/css/simple-sidebar.css') }}" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      @include('layouts.navbar')

      @yield('content')

      
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('/editor/public/editor/vendor/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset('/editor/public/editor/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>

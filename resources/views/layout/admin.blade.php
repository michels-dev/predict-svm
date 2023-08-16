<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SVM-PREDICT</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  {{-- Fontawesome --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  {{-- toastr --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css')}}">
  {{-- {{ asset('template/')}} --}}
  @stack('css')
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
          <a href="#" class="d-block text-dark text-bold"><img src="{{asset('template/dist/user.png')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">{{ Auth::user()->name }}</a>
        </a>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <span href="/" class="brand-link">
      <img src="{{asset('template/dist/predict.png')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
      <a href="/" class="brand-text text-white text-center">Svm PREDICT</a>
    </span>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <div id="emailHelp" class="form-text">Home</div>
            <a href="/" class="nav-link">
              <i class="fa-sharp fa-solid fa-table-columns text-white"></i>
              <p class="text-white text-bold">
                Dashboard
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          @if (Auth::user()->role == "admin")
          <li class="nav-item">
            <div id="emailHelp" class="form-text">Component</div>
            <a href="/stroke" class="nav-link">
              <i class="fa-solid fa-layer-group text-white"></i>
              <p class="text-white text-bold">
                Data Training
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          @endif
          @if (Auth::user()->role == 'user')
		  <li class="nav-item">
        <div id="emailHelp" class="form-text">Component</div>
            <a href="{{ route('predict.form') }}" class="nav-link">
				<i class="fa-solid fa-pen-to-square text-white"></i>
              <p class="text-white text-bold">
                Prediksi
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="{{ route('predict.form') }}" class="nav-link">
				<i class="fa-solid fa-pen-to-square text-white"></i>
              <p class="text-white text-bold">
                Prediksi
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <div id="emailHelp" class="form-text">Aksi</div>
            <a href="/panduan" class="nav-link">
              <i class="fa-solid fa-book text-white"></i>
              <p class="text-white text-bold">
                Pedoman
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="/logout" class="nav-link">
				      <i class="fa-solid fa-right-from-bracket text-white"></i>
              <p class="text-white text-bold">
                LOGOUT
              <span class="right badge badge-danger"></span>
            </p>
          </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  {{-- CONTENT --}}
  @yield('content')
  {{-- AKHIR CONTENT --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Skripsi &copy; 2023 <a href="https://github.com/michels-dev">Michel Sinambela</a>.</strong>
    Web Developer.
    <div class="float-right d-none d-sm-inline-block">
      <b>svm-predict</b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{ asset('template/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template/dist/js/pages/dashboard3.js')}}"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	{{-- script sweet alert --}}
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	{{-- end --}}
	{{-- script toastr --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

  @yield('footer')

  @yield('footer1')

  @yield('stlingkaran')

  @yield('footer2')

  @yield('footer4')

  @yield('footer3')

  @stack('scripts')

</body>
</html>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="{{ asset('images/logo.png') }}" rel="shortcut icon" >
    <title>Cabinet @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">




    <!-- Navbar -->
    <top-nav-medecin ></top-nav-medecin>


    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <side-nav-medecin prenom="{{ \Illuminate\Support\Facades\Auth::user()->prenom }}" nom="{{ \Illuminate\Support\Facades\Auth::user()->nom }}" type='@yield('title')' userlogo="{{ asset('images/UserMalade.png') }}" logo="{{ asset('images/logo.png') }}" ></side-nav-medecin>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')

            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer-medecin></footer-medecin>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon icon-->
    <link
    rel="shortcut icon"
    type="image/x-icon"
    href="{{url('assets/images/favicon/favicon.ico')}}"
  />

  <!-- Libs CSS -->

  <link
    href="{{url('assets/libs/bootstrap-icons/font/bootstrap-icons.css')}}"
    rel="stylesheet"
  />
  <link href="{{url('assets/libs/dropzone/dist/dropzone.css')}}" rel="stylesheet" />

  <link
    href="{{url('assets/libs/@mdi/font/css/materialdesignicons.min.css')}}"
    rel="stylesheet"
  />
  <link
    href="{{url('assets/libs/prismjs/themes/prism-okaidia.css')}}"
    rel="stylesheet"
  />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{url('assets/css/theme.min.css')}}" />
  <title>Homepage | Dash Ui - Bootstrap 5 Admin Dashboard Template</title>
</head>
<body>
  <div id="db-wrapper">
    <!-- navbar vertical -->
    <!-- Sidebar -->
    @include('partials.SideBar')
    <!-- Page content -->
    <div id="page-content">
      @include('partials.Navbar')
      <!-- Container fluid -->
      @yield('content')
    </div>
  </div>
  <script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/libs/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{url('assets/libs/feather-icons/dist/feather.min.js')}}"></script>
  <script src="{{url('assets/libs/prismjs/prism.js')}}"></script>
  <script src="{{url('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{url('assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
  <script src="{{url('assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js')}}"></script>
  <script src="{{url('assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js')}}"></script>

  <!-- Theme JS -->
  <script src="{{url('assets/js/theme.min.js')}}"></script>
</body>

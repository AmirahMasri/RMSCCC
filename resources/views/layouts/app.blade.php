<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RMSCCC') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/vertical-layout-light/style.css">
    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">

        <!-- <main> -->
            @yield('content')
        <!-- </main> -->
    </div>
    <script src="{{ URL::to('/') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ URL::to('/') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ URL::to('/') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ URL::to('/') }}/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ URL::to('/') }}/js/off-canvas.js"></script>
    <script src="{{ URL::to('/') }}/js/hoverable-collapse.js"></script>
    <script src="{{ URL::to('/') }}/js/template.js"></script>
    <script src="{{ URL::to('/') }}/js/settings.js"></script>
    <script src="{{ URL::to('/') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ URL::to('/') }}/js/dashboard.js"></script>
    <script src="{{ URL::to('/') }}/js/Chart.roundedBarCharts.js"></script>
</body>

</html>
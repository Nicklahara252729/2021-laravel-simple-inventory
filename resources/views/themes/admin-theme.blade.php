<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="_token" content="{{csrf_token()}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>SSC Inventory</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="{{asset('assets/css/material-dashboard.min40a0.css?v=2.0.2')}}" rel="stylesheet" />
    <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />

</head>

<body class="">
    <div class="wrapper ">
        @include('themes.admin-element.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
            @include('themes.admin-element.header')
            <!-- End Navbar -->
            <div class="content">
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('themes.admin-element.footer')
        </div>
    </div>
    @yield('modal')
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
    <script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/arrive.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chartist.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
    <script src="{{asset('assets/js/material-dashboard.min40a0.js?v=2.0.2')}}" type="text/javascript"></script>    
    <script src="{{asset('assets/demo/jquery.sharrre.js')}}"></script>
    @yield('js')
</body>

</html>
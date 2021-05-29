<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Or.Weather | Trang điều khiểng</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- add icon link -->
    <link rel="icon" href= "{{asset('public/admin-dashboard/images/admin.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">


    <link rel="stylesheet" href="{{asset('public/admin-dashboard/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img src="{{asset('public/weather_widget/images/cloudy.png')}}" style="width: 40px; height:40px;" alt="Logo"> WEATHER</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Tổng quan thời tiết </a>
                    </li>
                    <h3 class="menu-title">Thời tiết</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-umbrella menu-icon"></i> Quản lý thời tiết</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-cloud"></i><a href="{{ route('admin.page.all') }}">Tất cả thời tiết gần đây</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset('public/admin-dashboard/images/admin.png')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Xin chào, admin</a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Cài đặt thông tin</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Đăng xuất</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        @yield('admin')
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{asset('public/admin-dashboard/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/assets/js/main.js')}}"></script>


    <script src="{{asset('public/admin-dashboard/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/assets/js/widgets.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>

    <script src="{{asset('public/admin-dashboard/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>

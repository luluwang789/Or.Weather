<!doctype html>
<html class="no-js" lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Session::get('title');?> | Admin Or.Weather</title> <!-- link title -->
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

<body onload="startTime()">
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
                            <li><i class="fa fa-history" aria-hidden="true"></i><a href="{{ route('admin.page.all-current') }}">Lịch sử tìm kiếm</a></li>
                            <li><i class="fa fa-cloud"></i><a href="{{ route('admin.page.all-day') }}">Thời tiết tìm kiếm theo ngày</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Tài khoản</h3><!-- /.menu-title -->
                    <li><a href="{{ route('admin.account-setting') }}"><i class="menu-icon fa fa-user-circle" aria-hidden="true"></i>Cài đặt thông tin</a></li>
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
                            <a class="nav-link" href="{{ route('admin.account-setting') }}"><i class="fa fa-user"></i> Xin chào, <?php if(!empty($name)){ echo $name;}?></a>

                            <a class="nav-link" href="{{ route('admin.account-setting') }}"><i class="fa fa-cog"></i> Cài đặt thông tin</a>

                            <a class="nav-link" href="{{ route('get.logout') }}"><i class="fa fa-power-off"></i> Đăng xuất</a>
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
    <!--  Chart js -->
    {{-- <script src="{{asset('public/admin-dashboard/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script> --}}
    
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    
    <!-- time -->
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('Time').innerHTML =
            h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
    <!-- //time -->
    <!-- Your application script -->
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
    {{-- chart --}}
    <script>
        $(document).on('click', '#btn-submit', function(){
            var option = $("#Option").val();
            var city = $("#City").val();
            var date = $("#Date").val();
            var temp = []; // tmep_c
            var hour = []; // label
            $.ajax({
                type: "GET",
                url: "http://localhost:81/weather/admin/map/"+option+"/"+city+"/"+date,
                dataType: "JSON",
                success: function (data) {
                    
                    console.log(data[0].map);

                    if(option == 'hour')
                    {
                        for(var i = 0; i < data[0].map.length; i++){
                            temp.push(data[0].map[i].temp_c);
                            hour.push(new Date(data[0].map[i].time).getHours());
                        }
                    }
                    else
                    {
                        for(var i = 0; i < data[0].map.length; i++){
                            temp.push(data[0].map[i].day_avgtemp_c);

                            var date = new Date(data[0].map[i].date);
                            var dd = String(date.getDate()).padStart(2, '0');
                            var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
                            var yyyy = date.getFullYear();
                            hour.push(mm + '/' + dd + '/' + yyyy);
                        }
                    }
                    var ctx = document.getElementById( "team-chart" );
                    // ctx.refresh();
                    // ctx.height = 150;
                    // location.reload();
                    
                    var myChart = new Chart( ctx, {
                        type: 'line',
                        data: {
                            labels: hour,
                            type: 'line',
                            defaultFontFamily: 'Montserrat',
                            datasets: [ {
                                data: temp,
                                label: "Biểu đồ nhiệt độ (°C) theo " + option,
                                backgroundColor: 'rgba(0,103,255,.15)',
                                borderColor: 'rgba(0,103,255,0.5)',
                                borderWidth: 3.5,
                                pointStyle: 'circle',
                                pointRadius: 5,
                                pointBorderColor: 'transparent',
                                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                                    }, ]
                        },
                        options: {
                            responsive: true,
                            tooltips: {
                                mode: 'index',
                                titleFontSize: 12,
                                titleFontColor: '#000',
                                bodyFontColor: '#000',
                                backgroundColor: '#fff',
                                titleFontFamily: 'Montserrat',
                                bodyFontFamily: 'Montserrat',
                                cornerRadius: 3,
                                intersect: false,
                            },
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    usePointStyle: true,
                                    fontFamily: 'Montserrat',
                                },


                            },
                            scales: {
                                xAxes: [ {
                                    display: true,
                                    gridLines: {
                                        display: true,
                                        drawBorder: true
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Thời gian (' + option + ')'
                                    }
                                        } ],
                                yAxes: [ {
                                    display: true,
                                    gridLines: {
                                        display: true,
                                        drawBorder: true
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Nhiệt độ (°C)'
                                    }
                                        } ]
                            },
                        }
                    } );
                    
                    myChart.render();
                }
            });
            
        });
    </script>
    {{-- model-day --}}
    <script type="text/javascript">
        $(".btn-model-abc-day").on('click',function () { 
            var id = $(this).data("id");
            // console.log(id)
            $.ajax({
                type: "get",
                url: "http://localhost:81/weather/admin/find/day/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);

                    $("#img").attr("src",response.day_condition_icon);
                    $("#title-img").text(response.day_condition_text);
                    $("#name_city").text(response.name_city);

                    var date = new Date(response.date);
                    var dd = String(date.getDate()).padStart(2, '0');
                    var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = date.getFullYear();
                    $("#date").text(mm + '/' + dd + '/' + yyyy);
                    $("#day_avghumidity").text(response.day_avghumidity);
                    $("#day_avgtemp_c").text(response.day_avgtemp_c);
                    $("#day_avgtemp_f").text(response.day_avgtemp_f);
                    $("#day_avgvis_km").text(response.day_avgvis_km);
                    $("#day_avgvis_miles").text(response.day_avgvis_miles);
                    $("#day_daily_chance_of_rain").text(response.day_daily_chance_of_rain);
                    $("#day_daily_chance_of_snow").text(response.day_daily_chance_of_snow);
                    $("#day_daily_will_it_rain").text(response.day_daily_will_it_rain);
                    $("#day_daily_will_it_snow").text(response.day_daily_will_it_snow);
                    $("#day_maxwind_kph").text(response.day_maxwind_kph);
                    $("#day_maxwind_mph").text(response.day_maxwind_mph);
                    $("#day_maxtemp_c").text(response.day_maxtemp_c);
                    $("#day_maxtemp_f").text(response.day_maxtemp_f);
                    $("#day_mintemp_c").text(response.day_mintemp_c);
                    $("#day_mintemp_f").text(response.day_mintemp_f);
                    $("#day_totalprecip_in").text(response.day_totalprecip_in);
                    $("#day_totalprecip_mm").text(response.day_totalprecip_mm);
                    $("#day_uv").text(response.day_uv);
                }
            });
        });
    </script>

    {{-- model-current --}}
    <script type="text/javascript">
        $(".btn-model-abc-current").on('click',function () { 
            var id = $(this).data("id");
            // console.log(id)
            $.ajax({
                type: "get",
                url: "http://localhost:81/weather/admin/find/current/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $("#img").attr("src", response.condition_icon);
                    $("#title-img").text(response.condition_text);
                    $("#name_city").text(response.name_city);
                    $("#last_updated").text(response.last_updated);
                    $("#is_day").text(response.is_day);
                    $("#temp_c").text(response.temp_c);
                    $("#temp_f").text(response.temp_f);
                    $("#feelslike_c").text(response.feelslike_c);
                    $("#feelslike_f").text(response.feelslike_f);
                    $("#uv").text(response.uv);
                    $("#cloud").text(response.cloud);
                    $("#gust_kph").text(response.gust_kph);
                    $("#gust_mph").text(response.gust_mph);
                    $("#humidity").text(response.humidity);
                    $("#wind_degree").text(response.wind_degree);
                    $("#wind_dir").text(response.wind_dir);
                    $("#wind_kph").text(response.wind_kph);
                    $("#wind_mph").text(response.wind_mph);
                }
            });
        });
    </script>
</body>

</html>

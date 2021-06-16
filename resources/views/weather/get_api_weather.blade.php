<!DOCTYPE html>
<html>
<head>
<title>Dự báo thời tiết</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Aridity Weather Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- add icon link -->
<link rel="icon" href="{{ asset('public/weather_widget/images/cloudy.png') }}" type="image/x-icon">
<!-- //custom-theme -->
<link href="{{asset('public/weather_widget/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/cdn/bootstrap-4.5/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/cdn/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/cdn/select2/select2.min.css') }}">
<!-- js -->
<script type="text/javascript" src="{{asset('public/weather_widget/js/jquery.min.js')}}"></script>
<!-- //js --> 
<link rel="stylesheet" type="text/css" href="{{asset('public/weather_widget/css/easy-responsive-tabs.css')}}" />
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body onload="startTime()">
	<div class="main">	
		<h1>Dự báo thời tiết <span style="color: rgb(233, 72, 72);">Or.Weather</span></h1>
        <br>
		<div class="search-city">
			<form action="{{ route('admin.search') }}" method="GET">
				<div class="input-group">
					<div class="select-search">
						<select name="search" id="select-search" class="input-search-city">
							<option value="">Chọn thành phố</option>
							@foreach ($location as $loca)
								<option value="{{ $loca->name }}">{{ $loca->name }}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn-search-city"><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>
			</form>
		</div>
        <br>
		<div class="w3_agile_main_grids">
			<div class="w3layouts_main_grid">
				<div class="w3layouts_main_grid_left">
					@if ($current_default != null)
					<h2>{{ $current_default->name_city }}</h2>

					<p>{{ $current_default->condition_text }}</p>

					<h3>Nhiệt độ hiện tại</h3>

					<h4>{{ $current_default->temp_c }}<span>°C</span></h4>
					@endif
				</div>
				<div class="w3layouts_main_grid_right">
					@if ($current_default != null)
					<img src="{{ $current_default->condition_icon }}" alt="" width="100" height="100">
					@else
					<canvas id="sleet" width="70" height="70"> </canvas>
					@endif
					<div id="w3time"></div>
					<div class="w3layouts_date_year">
						<!-- date -->
							<script type="text/javascript">
							   var mydate=new Date()
							   var year=mydate.getYear()
							   if(year<1000)
								 year+=1900
								 var day=mydate.getDay()
								 var month=mydate.getMonth()
								 var daym=mydate.getDate()
							   if(daym<10)
								 daym="0"+daym
								 var dayarray=new Array("Chủ nhật","Thứ hai","Thứ ba","Thứ 4","Thứ 5","Thứ 6","Thứ 7")
								 var montharray=new Array("Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12")
								 document.write(""+dayarray[day]+", ngày "+daym+" "+montharray[month]+" , "+year+"")
							</script>
						<!-- //date -->
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			
			<div class="agileits_w3layouts_main_grid">
				<div class="agile_main_grid_left">
					<div class="wthree_main_grid_left_grid">
						<div class="w3ls_main_grid_left_grid1">
							<div class="w3l_main_grid_left_grid1_left">
								<h3>Tia UV</h3>
								@if ($current_default != null)
								<p>{{ $current_default->uv }} <span>eV</span></p>
								@endif
							</div>
							<div class="w3l_main_grid_left_grid1_right">
								<canvas id="partly-cloudy-day" width="45" height="45"></canvas>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="w3ls_main_grid_left_grid1">
							<div class="w3l_main_grid_left_grid1_left">
								<h3>Đám mây</h3>
								@if ($current_default != null)
								<p>{{ $current_default->cloud }} <span>%</span></p>
								@endif
							</div>
							<div class="w3l_main_grid_left_grid1_right">
								<canvas id="cloudy" width="45" height="45"></canvas>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="w3ls_main_grid_left_grid1">
							<div class="w3l_main_grid_left_grid1_left">
								<h3>Tốc độ gió</h3>
								@if ($current_default != null)
								<p>{{ $current_default->wind_kph }} <span>Km/h</span></p>
								@endif
							</div>
							<div class="w3l_main_grid_left_grid1_right">
								<canvas id="wind" width="45" height="45"></canvas>
							</div>
							<div class="clear"> </div>
						</div>
					</div>
				</div>
				<div class="w3_agileits_main_grid_right">
					<div class="agileinfo_main_grid_right_grid">
						<div id="parentHorizontalTab">
							<ul class="resp-tabs-list hor_1">
								<li>Ngày</li>
								{{-- <li>Tuần</li> --}}
							</ul>
							<div class="resp-tabs-container hor_1">
								<div class="w3_agileits_tabs"> 
									@foreach ($forecast_hour as $hour)
									<div class="w3_main_grid_right_grid1">
										<div class="w3_main_grid_right_grid1_left">
											<p>{{ $hour->time }}</p>
										</div>
										<div class="w3_main_grid_right_grid1_right">
											<p>{{ $hour->temp_c }}<i>°c</i><span>{{ $hour->condition_text }}</span></p>
										</div>
										<div class="clear"> </div>
									</div>
									@endforeach
									
								</div>
								{{-- <div class="w3_agileits_tabs">
									<div class="w3_main_grid_right_grid1">
										<div class="w3_main_grid_right_grid1_left">
											<p>Thứ 2</p>
										</div>
										<div class="w3_main_grid_right_grid1_right">
											<p>14<i>°c</i><span>Clear</span></p>
										</div>
										<div class="clear"> </div>
									</div>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		
		<div class="agileits_copyright">
			<p>© 2021 Aridity Weather Widget. All rights reserved | Design by duchoaitranit@gmail.com</p>
		</div>
	</div>
	<!-- sky-icons -->
		<script src="{{asset('public/weather_widget/js/skycons.js')}}"></script>
		<script>
		 var icons = new Skycons({"color": "#999999"}),
			  list  = [
				"sleet"
			  ],
			  i;

		  for(i = list.length; i--; )
			icons.set(list[i], list[i]);

		  icons.play();
		</script>
		<script>
			 var icons = new Skycons({"color": "#f5f5f5"}),
				  list  = [
					"clear-night", "partly-cloudy-day",
					"partly-cloudy-night", "cloudy", "rain", "clear-day", "snow", "wind",
					"fog"
				  ],
				  i;

			  for(i = list.length; i--; )
				icons.set(list[i], list[i]);

			  icons.play();
		</script>
	<!-- //sky-icons -->
	<!-- tabs -->
		<script src="{{asset('public/weather_widget/js/easyResponsiveTabs.js')}}"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				//Horizontal Tab
				$('#parentHorizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					tabidentify: 'hor_1', // The tab groups identifier
					activate: function(event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#nested-tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
			});
		</script>
	<!-- //tabs -->
	<!-- time -->
		<script>
			function startTime() {
				var today = new Date();
				var h = today.getHours();
				var m = today.getMinutes();
				var s = today.getSeconds();
				m = checkTime(m);
				s = checkTime(s);
				document.getElementById('w3time').innerHTML =
				h + ":" + m + ":" + s;
				var t = setTimeout(startTime, 500);
			}
			function checkTime(i) {
				if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
				return i;
			}
		</script>
	<!-- //time -->
	<script src="{{ asset('public/cdn/select2/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#select-search').select2();
		});
	</script>
</body>
</html>
@extends('admin.admin')
@section('admin')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Quản lý thời tiết</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('admin.dashboard') }}">Tổng quan thời tiết</a></li>
                    <li class="active">Thời tiết tìm kiếm theo ngày</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <?php
                $message = Session::get('message');
                if($message)
                {
                    echo $message;
                    Session::put('message', null);
                }    
                ?>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Thời tiết tìm kiếm theo ngày</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 25%">Thành Phố</th>
                                    <th style="width: 20%">Ngày</th>
                                    <th style="width: 15%">Nhiệt độ</th>
                                    <th style="">Tình trạng</th>
                                    <th style="width: 18%">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forecast as $fore)  
                                <tr>
                                    <td>{{ $fore->name_city }}</td>
                                    <td>{{ $fore->date }}</td>
                                    <td>{{ $fore->day_avgtemp_c }}</td>
                                    <td>{{ $fore->day_condition_text }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" data-id="{{ $fore->id }}" class="btn btn-info btn-sm btn-model-abc-day" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-edit"></i> Chi tiết
                                        </button>
                                        <a href="{{ route('admin.page.all-day.delete', $fore->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">CHI TIẾT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="mx-auto d-block">
                <img class="rounded-circle mx-auto d-block" id="img" src="" alt="Card image cap">
                <h5 class="text-sm-center mt-2 mb-1"><strong id="title-img"></strong></h5>
            </div>
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>Tên giá trị</th>
                        <th>Giá trị</th>
                        <th>Đơn vị</th>
                        <th>Mô tả</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>name_city</td>
                        <td id="name_city"></td>
                        <td></td>
                        <td>Tên thành phố</td>
                    </tr>
                    <tr>
                        <td>date</td>
                        <td id="date"></td>
                        <td>dd-mm-yyyy</td>
                        <td>Thời gian</td>
                    </tr>
                    <tr>
                        <td>day_avghumidity</td>
                        <td id="day_avghumidity"></td>
                        <td>%</td>
                        <td>‎Độ ẩm trung bình theo tỷ lệ phần trăm‎</td>
                    </tr>
                    <tr>
                        <td>day_avgtemp_c</td>
                        <td id="day_avgtemp_c"></td>
                        <td>°C</td>
                        <td>‎Nhiệt độ trung bình trong celsius trong ngày‎</td>
                    </tr>
                    <tr>
                        <td>day_avgtemp_f</td>
                        <td id="day_avgtemp_f"></td>
                        <td>°F</td>
                        <td>‎Nhiệt độ trung bình trong fahrenheit trong ngày‎</td>
                    </tr>
                    <tr>
                        <td>day_avgvis_km</td>
                        <td id="day_avgvis_km"></td>
                        <td>km</td>
                        <td>‎Tầm nhìn trung bình tính bằng km‎</td>
                    </tr>
                    <tr>
                        <td>day_avgvis_miles</td>
                        <td id="day_avgvis_miles"></td>
                        <td>m</td>
                        <td>‎Tầm nhìn trung bình tính bằng mét</td>
                    </tr>
                    <tr>
                        <td>day_daily_chance_of_rain</td>
                        <td id="day_daily_chance_of_rain"></td>
                        <td>%</td>
                        <td>‎Cơ hội mưa với tỷ lệ phần trăm theo ngày‎</td>
                    </tr>
                    <tr>
                        <td>day_daily_chance_of_snow</td>
                        <td id="day_daily_chance_of_snow"></td>
                        <td>%</td>
                        <td>‎Cơ hội tuyết với tỷ lệ phần trăm theo ngày</td>
                    </tr>
                    <tr>
                        <td>day_daily_will_it_rain</td>
                        <td id="day_daily_will_it_rain"></td>
                        <td>1 = Yes 0 = No</td>
                        <td>‎Có mưa trong ngày hay không</td>
                    </tr>
                    <tr>
                        <td>day_daily_will_it_snow</td>
                        <td id="day_daily_will_it_snow"></td>
                        <td>1 = Yes 0 = No</td>
                        <td>‎Có tuyết trong ngày hay không</td>
                    </tr>
                    <tr>
                        <td>day_maxtemp_c</td>
                        <td id="day_maxtemp_c"></td>
                        <td>°C</td>
                        <td>‎Nhiệt độ tối đa theo độ C trong ngày</td>
                    </tr>
                    <tr>
                        <td>day_maxtemp_f</td>
                        <td id="day_maxtemp_f"></td>
                        <td>°F</td>
                        <td>‎Nhiệt độ tối đa theo độ F trong ngày‎</td>
                    </tr>
                    <tr>
                        <td>day_maxwind_kph</td>
                        <td id="day_maxwind_kph"></td>
                        <td>km/h</td>
                        <td>‎Tốc độ gió tối đa theo km mỗi giờ‎</td>
                    </tr>
                    <tr>
                        <td>day_maxwind_mph</td>
                        <td id="day_maxwind_mph"></td>
                        <td>m/s</td>
                        <td>‎Tốc độ gió tối đa theo dặm mỗi giờ‎</td>
                    </tr>
                    <tr>
                        <td>day_mintemp_c</td>
                        <td id="day_mintemp_c"></td>
                        <td>°C</td>
                        <td>‎Nhiệt độ tối thiểu theo độ C trong ngày</td>
                    </tr>
                    <tr>
                        <td>day_mintemp_f</td>
                        <td id="day_mintemp_f"></td>
                        <td>°F</td>
                        <td>‎Nhiệt độ tối thiểu theo độ F trong ngày‎</td>
                    </tr>
                    <tr>
                        <td>day_totalprecip_in</td>
                        <td id="day_totalprecip_in"></td>
                        <td>inch‎</td>
                        <td>‎Tổng lượng mưa tính bằng inch‎</td>
                    </tr>
                    <tr>
                        <td>day_totalprecip_mm</td>
                        <td id="day_totalprecip_mm"></td>
                        <td>mn‎</td>
                        <td>‎Tổng lượng mưa tính bằng milimet‎</td>
                    </tr>
                    <tr>
                        <td>day_uv</td>
                        <td id="day_uv"></td>
                        <td>mức</td>
                        <td>Chỉ số uv</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Đóng</button>
        </div>
    </div>
    </div>
</div>
{{--  --}}
@endsection
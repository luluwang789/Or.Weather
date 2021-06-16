@extends('admin.admin')
@section('admin')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Quãn lý thời tiết</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('admin.dashboard') }}">Tổng quan thời tiết</a></li>
                    <li class="active">Lịch sử tìm kiếm</li>
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
                        <strong class="card-title">Lịch sử tìm kiếm</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 25%">Thành Phố</th>
                                    <th style="width: 20%">Thời gian</th>
                                    <th style="width: 15%">Nhiệt độ</th>
                                    <th style="">Tình trạng</th>
                                    <th style="width: 18%">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($current as $curr)  
                                <tr>
                                    <td>{{ $curr->name_city }}</td>
                                    <td>{{ $curr->last_updated }}</td>
                                    <td>{{ $curr->temp_c }}</td>
                                    <td>{{ $curr->condition_text }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" data-id="{{ $curr->id }}" class="btn btn-info btn-sm btn-model-abc-current" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-edit"></i> Chi tiết
                                        </button>
                                        <a href="{{ route('admin.page.all-current.delete', $curr->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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
                        <td>last_updated</td>
                        <td id="last_updated"></td>
                        <td>dd-mm-yyyy hh:mn:ss</td>
                        <td>Thời gian</td>
                    </tr>
                    <tr>
                        <td>is_day</td>
                        <td id="is_day"></td>
                        <td>1 = Yes 0 = No</td>
                        <td>‎Hiển thị biểu tượng điều kiện ngày hay biểu tượng ban đêm‎</td>
                    </tr>
                    <tr>
                        <td>temp_c</td>
                        <td id="temp_c"></td>
                        <td>°C</td>
                        <td>Nhiệt độ trong celsius‎</td>
                    </tr>
                    <tr>
                        <td>temp_f</td>
                        <td id="temp_f"></td>
                        <td>°F</td>
                        <td>‎Nhiệt độ trong fahrenheit‎</td>
                    </tr>
                    <tr>
                        <td>feelslike_c</td>
                        <td id="feelslike_c"></td>
                        <td>°C</td>
                        <td>‎Cảm giác như nhiệt độ như celcius‎</td>
                    </tr>
                    <tr>
                        <td>feelslike_f</td>
                        <td id="feelslike_f"></td>
                        <td>°F</td>
                        <td>‎Cảm giác như nhiệt độ như fahrenheit‎</td>
                    </tr>
                    <tr>
                        <td>uv</td>
                        <td id="uv"></td>
                        <td>mức</td>
                        <td>‎Chỉ số UV‎</td>
                    </tr>
                    <tr>
                        <td>cloud</td>
                        <td id="cloud"></td>
                        <td>%</td>
                        <td>‎Bao phủ đám mây theo tỷ lệ phần trăm‎</td>
                    </tr>
                    <tr>
                        <td>gust_kph</td>
                        <td id="gust_kph"></td>
                        <td>km/h</td>
                        <td>‎Gió giật theo km mỗi giờ‎</td>
                    </tr>
                    <tr>
                        <td>gust_mph</td>
                        <td id="gust_mph"></td>
                        <td>m/s</td>
                        <td>Gió giật theo m mỗi giờ</td>
                    </tr>
                    <tr>
                        <td>humidity</td>
                        <td id="humidity"></td>
                        <td>%</td>
                        <td>‎Độ ẩm theo tỷ lệ phần trăm‎</td>
                    </tr>
                    <tr>
                        <td>wind_degree</td>
                        <td id="wind_degree"></td>
                        <td>°</td>
                        <td>‎Hướng gió theo độ‎</td>
                    </tr>
                    <tr>
                        <td>wind_dir</td>
                        <td id="wind_dir"></td>
                        <td></td>
                        <td>‎Hướng gió la bàn 16 điểm</td>
                    </tr>
                    <tr>
                        <td>wind_kph</td>
                        <td id="wind_kph"></td>
                        <td>km/h</td>
                        <td>‎‎Tốc độ gió theo km mỗi giờ‎</td>
                    </tr>
                    <tr>
                        <td>wind_mph</td>
                        <td id="wind_mph"></td>
                        <td>m/s</td>
                        <td>‎Tốc độ gió theo dặm mỗi giờ‎</td>
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
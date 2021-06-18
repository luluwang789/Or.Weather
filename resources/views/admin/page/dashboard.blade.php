@extends('admin.admin')
@section('admin')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tổng quan thời tiết</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Tổng quan thời tiết</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3" >

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="card-title mb-0"><span id="Time"></span></h4>
                        <div class="small text-muted"> 
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
                    <!--/.col-->
                    <div class="col-sm-8 hidden-sm-down">
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                            <form id="form-data">
                                <div class="btn-group mr-2" aria-label="First group">
                                    <select name="weatherOption" id="Option" class="form-control form-control-sm">
                                        <option value="hour">Hour</option>
                                        <option value="day">Day</option>
                                    </select>
                                </div>
                                <div class="btn-group mr-2" aria-label="First group">
                                    <select name="weatherCity" id="City" class="form-control form-control-sm">
                                        @foreach ($location as $loca)
                                            <option value="{{ $loca->name }}">{{ $loca->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn-group mr-2" aria-label="First group">
                                    <input type="date" name="weatherDate" id="Date" class="form-control form-control-sm">
                                </div>
                                <div class="btn-group mr-2" aria-label="First group">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn-submit" onclick="updateChart()">Thống kê</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/.col-->

                </div>

            </div>
            
        </div>
        <div class="card">
            <div class="card-header">
                <h4>BIỂU ĐỒ THỜI TIẾT</h4>
            </div>
            <div class="card-body">
                <!--/.row-->
                <div class="chart-wrapper mt-4">
                    {{-- Chart JS --}}
                    <canvas id="team-chart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div> <!-- .content -->
@endsection
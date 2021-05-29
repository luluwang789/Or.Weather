<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Or.Weather | Đăng nhập Admin</title>
    <meta name="description" content="Đăng nhập Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- add icon link -->
    <link rel="icon" href= "{{asset('public/admin-dashboard/images/admin.png')}}" type="image/x-icon">


    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin-dashboard/vendors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" href="{{asset('public/admin-dashboard/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <img class="align-content" src="{{asset('public/weather_widget/images/cloudy.png')}}"  style="width: 80px; height:80px;"  alt="">
                    <h2 class="h2-login">Đăng nhập ADMIN</h2> 
                </div>
                <div class="login-form">
                    <form>
                        <div class="form-group">
                            <label>Tài khoản</label>
                            <input type="text" class="form-control" name="username" placeholder="Nhập tài khoản ở đây ...">
                        </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu ở đây ...">
                        </div>
                                <div class="checkbox">
                                    <label>
                                
                            </label>
                                    <label class="pull-right">
                                <a href="#">Quên mật khẩu?</a>
                            </label>

                            </div>
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('public/admin-dashboard/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin-dashboard/assets/js/main.js')}}"></script>


</body>

</html>

@extends('admin.admin')
@section('admin')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tài khoản</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('admin.dashboard') }}">Tổng quan thời tiết</a></li>
                    <li class="active">Cài đặt thông tin</li>
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
                        <strong>Cài đặt thông tin tài khoản</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('admin.account-update', $user->id) }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tên:</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tài khoản:</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="account" name="account" class="form-control" value="{{ $user->account }}" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Mật khẩu:</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="password" name="password" class="form-control" value="{{ $user->password }}" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Email:</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Quyền:</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="role" id="role" class="form-control">
                                        <option value="{{ $user->role }}">@if($user->role == 1) admin @else manager @endif</option>
                                        <option value="1">admin</option>
                                        <option value="2">manager</option>
                                    </select>
                                </div>
                            </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Cập nhật
                        </button>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
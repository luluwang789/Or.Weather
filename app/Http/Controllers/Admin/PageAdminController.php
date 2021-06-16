<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForecastDay;
use App\Models\Hour;
use App\Models\Current;
use App\Models\Admin;
use Session;
use Auth;
use DB;

class PageAdminController extends Controller
{
    // all day
    public function all_day()
    {
        if(Auth::guard('admin')->check())
        {
            $id = Auth::guard('admin')->id();
            $name = Auth::guard('admin')->user()->name;
            $forecast = ForecastDay::all();
            Session::put('title', 'Thời tiết thành phố theo ngày');
            return view('admin.page.all_table', compact(['id', 'name', 'forecast']));
        }
        return redirect('/admin/login')->with('message', '<p style="color:red;">Bạn cần phải đăng nhập</p>');
    }

    // all current
    public function all_currnet()
    {
        if(Auth::guard('admin')->check())
        {
            $id = Auth::guard('admin')->id();
            $name = Auth::guard('admin')->user()->name;
            $current = Current::all();
            Session::put('title', 'Lịch sử tìm kiếm');
            return view('admin.page.history_weather', compact(['id', 'name', 'current']));
        }
        return redirect('/admin/login')->with('message', '<p style="color:red;">Bạn cần phải đăng nhập</p>');
    }

    // delete day weather
    public function delete_day($id)
    {
        $forecast = ForecastDay::find($id);    
        $forecast->hour()->delete();
        $forecast->delete();
        return redirect()->back()->with('message', '
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success</span>
                Xóa thành công
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        ');
    }

    // delete current weather
    public function delete_current($id)
    {
        Current::where('id', $id)->delete();
        return redirect()->back()->with('message', '
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success</span>
                Xóa thành công
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        ');
    }

    // account
    public function profile_setting()
    {
        if(Auth::guard('admin')->check())
        {
            $id = Auth::guard('admin')->id();
            $name = Auth::guard('admin')->user()->name;
            $user = Admin::where('id', $id)->first();
            Session::put('title', 'Cài đặt thông tin');
            return view('admin.page.profile_account', compact(['id', 'name', 'user']));
        }
        return redirect('/admin/login')->with('message', '<p style="color:red;">Bạn cần phải đăng nhập</p>');
    }

    // update account
    public function profile_update(Request $request, $id)
    {
        $update = Admin::find($id);

        $update->name = $request->name;
        $update->account = $request->account;
        $update->password = bcrypt($request->password);
        $update->email = $request->email;
        $update->role = $request->role;

        $update->save();

        return redirect()->back()->with('message', '
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success</span>
                Cập nhật tài khoản thành công
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        ');
    }

    // map
    public function map($option, $city, $date)
    {
        if($option == 'hour')
        {
            $time_weather = DB::table('forecast_days')
                                ->join('hours', 'forecast_days.id', '=', 'hours.id_forecast')
                                ->select('forecast_days.name_city', 'forecast_days.date', 'hours.*')
                                ->where([['forecast_days.name_city', $city],['forecast_days.date', $date]])
                                ->orderBy('hours.id_forecast', 'DESC')
                                ->orderBy('hours.id', 'ASC')
                                ->limit(24)
                                ->get();
        }
        else
        {
            $time_weather = DB::table('forecast_days')
                                ->where('name_city', $city)
                                ->orderBy('date', 'ASC')
                                ->get();
        }
                            
        return response()->json([
            ["map" => $time_weather],
            ["option" => $option]
        ]);
    }

    // find id modal day
    public function find_id_modal_day($id)
    {
        $find_day = ForecastDay::find($id);

        return response()->json($find_day);
    }
 
    // find id modal current
    public function find_id_modal_current($id)
    {
        $find_current = Current::find($id);

        return response()->json($find_current);
    }
}

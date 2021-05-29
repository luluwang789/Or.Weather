<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageAdminController extends Controller
{
    // all
    public function all()
    {
        return view('admin.page.all_table');
    }
}

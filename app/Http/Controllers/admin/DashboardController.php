<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Function for admin dashboard
    public function dashboard(){
        return view('admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Function for customer dashboard
    public function dashboard(){
        return view('customer.dashboard');
    }
}

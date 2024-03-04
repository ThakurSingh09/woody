<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    //Function for all services list
    public function all_services(){
    $get_service_lists = Service::get();
        return view('admin.services.all-services-list', compact('get_service_lists'));
    }
}

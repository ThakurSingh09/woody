<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->user_type == 'admin') {
            return redirect('admin-dashboard');
        } elseif ($user->user_type == 'customer') {
            return redirect('dashboard');
        } else { 
            return redirect('login');
        }
    }
    //Function for show front site index page
    public function site_front_index(){
        return view('index');
    }

    //Function for about page
    public function about(){
        return view('about');
    }

    //Function for service page
    public function service(){
        return view('service');
    }

    //Function for project page
    public function project(){
        return view('project');
    }

    //Function for feature page
    public function feature(){
        return view('feature');
    }

    //Function for quote page
    public function quote(){
        return view('quote');
    }

    //Function for team page
    public function team(){
        return view('team');
    }

    //Function for testimonial page
    public function testimonial(){
        return view('testimonial');
    }

    //Function for 404 page
    public function error(){
        return view('error');
    }

    //Function for contact page
    public function contact(){
        return view('contact');
    }

}

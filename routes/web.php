<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Front site route
Route::get('/', [App\Http\Controllers\HomeController::class, 'site_front_index']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/service', [App\Http\Controllers\HomeController::class, 'service']);
Route::get('/project', [App\Http\Controllers\HomeController::class, 'project']);
Route::get('/feature', [App\Http\Controllers\HomeController::class, 'feature']);
Route::get('/quote', [App\Http\Controllers\HomeController::class, 'quote']);
Route::get('/team', [App\Http\Controllers\HomeController::class, 'team']);
Route::get('/error', [App\Http\Controllers\HomeController::class, 'error']);
Route::get('/testimonial', [App\Http\Controllers\HomeController::class, 'testimonial']);
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);

//Middleware route auth
Route::group(['middleware' => 'auth'], function() { 
//Admin Only 
Route::group(['middleware' => 'admin'], function() { 
    //Admin dashboard
    Route::get('admin-dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
    Route::get('admin/all-sliders', [App\Http\Controllers\Admin\SliderController::class, 'all_slider_lists']);
    Route::get('admin/add-new-slider', [App\Http\Controllers\Admin\SliderController::class, 'add_slider']);
    Route::post('admin/submit-slider', [App\Http\Controllers\Admin\SliderController::class, 'submit_slider'])->name('admin.submit.slider');
    Route::get('admin/edit-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'edit_slider']);
    Route::get('admin/delete-attach/{id}', [App\Http\Controllers\Admin\SliderController::class, 'delete_attach']);
    Route::post('admin/update-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'update_slider'])->name('admin.update.slider');
    Route::get('admin/delete-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'delete_slider']);
});

//Customer Only 
Route::group(['middleware' => 'customer'], function() { 
    //Customer dashboard
    Route::get('dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'dashboard']);
});

});  


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


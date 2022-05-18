<?php

use App\Http\Controllers\AdminProfileSettingController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {

        Route::view('login', 'admin.login')->name('admin.login');
        Route::post('login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.auth');
    });


  
    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('admin.home', [App\Http\Controllers\AdminController::class, 'adminhome'])->name('admin.home');

   


   Route::get('admin-dashboard', [App\Http\Controllers\AdminController::class, 'admin_dashboard'])->name('admin_dashboard');

   
   Route::get('inbox-email', [App\Http\Controllers\AdminController::class, 'inbox_email'])->name('inbox_email');
      


   Route::resource('adminprofilesetting', AdminProfileSettingController::class);

   Route::resource('change-password', ChangePasswordController::class);

     
   Route::get('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');


});
    

});
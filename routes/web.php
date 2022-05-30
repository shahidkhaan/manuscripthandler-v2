<?php

use App\Http\Controllers\Admin\ContentpagesController;
use App\Http\Controllers\Admin\JournalsControllers;
use App\Http\Controllers\Admin\NewsEventsManagmentController;
use App\Http\Controllers\AdminProfileSettingController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\viewusercontroller;
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



        Route::resource('users', UsersController::class);


     
       
        Route::resource('journals', JournalsControllers::class);


        Route::resource('newseventsmanagment', NewsEventsManagmentController::class);




        // contentpages

        Route::get('/contentpages/{id}', [App\Http\Controllers\Admin\ContentController::class, 'contentpages'])->name('contentpages');

        Route::post('/contentstore', [App\Http\Controllers\Admin\ContentController::class, 'contentstore'])->name('contentpages.store');
 
        Route::get('/content/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'contentedit'])->name('contentpages.edit');
 
        Route::post('/content_update/{id}', [App\Http\Controllers\Admin\ContentController::class, 'contentupdate'])->name('content-update');
        
        Route::post('/content/destroy/{id}', [App\Http\Controllers\Admin\ContentController::class, 'contentdestroy'])->name('contentpages.destroy');
 




        //checklist
        
        Route::get('/checklist/{id}', [App\Http\Controllers\Admin\ChecklistController::class, 'checklist'])->name('checklist');

        Route::post('/checklist', [App\Http\Controllers\Admin\ChecklistController::class, 'checkliststore'])->name('store-checklist');

        Route::post('/checklist/destroy/{id}', [App\Http\Controllers\Admin\ChecklistController::class, 'checklistdestroy'])->name('delete-checklist');

        Route::get('/checklist_edit/{id}', [App\Http\Controllers\Admin\ChecklistController::class, 'checklistedit'])->name('edit-checklist');

        Route::post('/checklist_update/{id}', [App\Http\Controllers\Admin\ChecklistController::class, 'checklistupdate'])->name('update-checklist');


     

       // typesofmanuscript


       Route::get('/typesofmanuscript/{id}', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscript'])->name('typesofmanuscript');

       Route::post('/typesofmanuscript/store', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscriptstore'])->name('store-typesofmanuscript');

       Route::post('/typesofmanuscript/destroy/{id}', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscriptdestroy'])->name('delete-typesofmanuscript');

       Route::get('/typesofmanuscript-edit/{id}', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscriptedit'])->name('edit-typesofmanuscript');
       
       Route::post('/typesofmanuscript_update/{id}', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscriptupdate'])->name('update-typesofmanuscript');





    //    filedesignation

    Route::get('/filedesignation/{id}', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignation'])->name('filedesignation');
    
    Route::post('/filedesignation/store', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignationstore'])->name('store-filedesignation');

    Route::post('/filedesignation/destroy/{id}', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignationdestroy'])->name('delete-filedesignation');

    Route::get('/filedesignation-edit/{id}', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignationedit'])->name('edit-filedesignation');
    
    Route::post('/filedesignation_update/{id}', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignationtupdate'])->name('update-filedesignation');



   // AreaSpecificInterest

   Route::get('/areaofspecificinterest/{id}', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificinterest'])->name('areaofspecificinterest');
    
   Route::post('/areaofspecificinterest/store', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificintereststore'])->name('store-areaofspecificinterest');

   Route::post('/areaofspecificinterest/destroy/{id}', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificinterestdestroy'])->name('delete-areaofspecificinterest');

   Route::get('/areaofspecificinterest-edit/{id}', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificinterestedit'])->name('edit-areaofspecificinterest');
   
   Route::post('/areaofspecificinterest_update/{id}', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificinterestupdate'])->name('update-areaofspecificinterest');

    

// checklist Text

Route::get('/checklisttext/{id}', [App\Http\Controllers\Admin\ChecklistTextController::class, 'checklisttext'])->name('checklisttext');

Route::post('/checklisttext', [App\Http\Controllers\Admin\ChecklistTextController::class, 'checklisttextstore'])->name('store-checklisttext');

// Route::post('/checklisttext/destroy/{id}', [App\Http\Controllers\Admin\ChecklistTextController::class, 'checklisttextdestroy'])->name('delete-checklisttext');

// Route::get('/checklisttext_edit/{id}', [App\Http\Controllers\Admin\ChecklistTextController::class, 'checklisttextedit'])->name('edit-checklisttext');

// Route::post('/checklisttext_update/{id}', [App\Http\Controllers\Admin\ChecklistTextController::class, 'checklisttextupdate'])->name('update-checklisttext');







    
        Route::get('admin-dashboard', [App\Http\Controllers\AdminController::class, 'admin_dashboard'])->name('admin_dashboard');


        Route::get('inbox-email', [App\Http\Controllers\AdminController::class, 'inbox_email'])->name('inbox_email');



        Route::resource('adminprofilesetting', AdminProfileSettingController::class);

        Route::resource('change-password', ChangePasswordController::class);


        Route::get('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    });
});

<?php

use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
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
Route::get('/page/{page_slug}', [FrontendController::class, 'pageShow']);

Auth::routes();



// Backend All Route
Route::prefix('admin')->middleware(['auth'])->group(function(){

    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Resource Route
    Route::resource('/module', ModuleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/page', PageController::class);
    Route::resource('/backup', BackupController::class)->only('index', 'store', 'destroy');

    Route::get('/backup/download/{file_name}', [BackupController::class, 'backup_download'])->name('backup_download');


    // ajax start
    Route::get('/page/is_active/{page_id}', [PageController::class, 'check_is_active']);

    Route::get('/my-profile/', [ProfileController::class, 'myProfile'])->name('myProfile');

    // System Setting Management Route
    Route::group(['as' => 'settings.', 'prefix' => 'settings'], function(){
        /** General Setting **/
        Route::get('general', [SettingController::class, 'general'])->name('general');
        Route::post('general', [SettingController::class, 'generalUpdate'])->name('general.update');

        /** Apperance Setting **/
        Route::get('apperance', [SettingController::class, 'apperance'])->name('apperance');
        Route::post('apperance', [SettingController::class, 'apperanceUpdate'])->name('apperance.update');

        /** Mail Setting **/
        Route::get('mail', [SettingController::class, 'mail'])->name('mail');
        Route::post('mail', [SettingController::class, 'mailUpdate'])->name('mail.update');

    });

});

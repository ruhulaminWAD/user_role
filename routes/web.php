<?php

use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
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
Route::get('/{page_slug}', [FrontendController::class, 'pageShow']);

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

    // ajax start
    Route::get('/user/is_active/{user_id}', [UserController::class, 'check_is_active']);
    Route::get('/page/is_active/{page_id}', [PageController::class, 'check_is_active']);



    Route::get('/my-profile/', [ProfileController::class, 'myProfile'])->name('myProfile');

});

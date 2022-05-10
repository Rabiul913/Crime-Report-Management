<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\ComplaintTypeController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\InvestigationController;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('login');
});



Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});

Route::resource('districts',DistrictController::class);
Route::resource('police_stations',PoliceStationController::class);
Route::resource('complaint_types',ComplaintTypeController::class);
Route::resource('complaints',ComplaintController::class);
Route::resource('investigations',InvestigationController::class);

Route::get('getpolicestations',[UserController::class, 'getPolicestations']);
Route::get('getcomplaintpolicestations',[ComplaintController::class, 'getPolicestations']);

<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// approve new user registration
Route::get('confirm', 'Auth\RegisterController@confirmEmail');

// restricted routes
Route::group(['middleware' => 'auth'], function () {

    // dashboard
    Route::get('/', [\App\Http\Controllers\InputController::class,'commodities']);
    Route::get('home', [\App\Http\Controllers\InputController::class,'commodities']);
    Route::get('result', [\App\Http\Controllers\DashboardController::class,'result']);
    Route::get('province', [\App\Http\Controllers\DownloadController::class,'provinceForecast']);
    Route::get('map-control', [\App\Http\Controllers\DashboardController::class,'mapControl']);
    Route::post('map-display', [\App\Http\Controllers\DashboardController::class,'displayMap']);

    // input controls
    Route::get('commodities', [\App\Http\Controllers\InputController::class,'commodities']);
    Route::get('commodities/add', [\App\Http\Controllers\InputController::class,'addCommodity']);
    Route::post('commodities/add', [\App\Http\Controllers\InputController::class,'saveCommodity']);
    Route::get('reports/upload', [\App\Http\Controllers\InputController::class,'uploadReportForm']);
    Route::post('reports/upload', [\App\Http\Controllers\InputController::class,'uploadReport']);
    Route::get('reports/list', [\App\Http\Controllers\InputController::class,'reportList']);
    Route::get('shifter', [\App\Http\Controllers\InputController::class,'addShifter']);
    Route::get('import-baseline', [\App\Http\Controllers\InputController::class,'importBaseline']);
    Route::get('crop/delete', [\App\Http\Controllers\InputController::class,'deleteCrop']);

    // forecast
    Route::post('forecast', [\App\Http\Controllers\ForecastController::class,'forecast']);
    Route::get('forecast', [\App\Http\Controllers\ForecastController::class,'forecast']);

    // change password
    Route::get('change-password', function() { return view('auth.password'); });
    Route::post('change-password', 'Auth\ResetPasswordController@changePassword');

    // user management
    Route::get('users', [\App\Http\Controllers\UserController::class,'list']);
    Route::get('user/edit', [\App\Http\Controllers\UserController::class,'editUserForm']);
    Route::post('user/update', [\App\Http\Controllers\UserController::class,'updateUser']);
    Route::get('user/access', [\App\Http\Controllers\UserController::class,'changeAccess']);
    Route::get('user/delete', [\App\Http\Controllers\UserController::class,'deleteUser']);

});

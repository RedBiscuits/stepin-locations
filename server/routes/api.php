<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientRecordController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserController;
use App\Models\ClientRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//Men (Example: 55 years of age with total cholesterol 213 mg/dL, HDL-C 50 mg/dL, untreated systolic BP 120 mm Hg, nonsmoker, and without diabetes)
//Women (Example: 55 years of age with total cholesterol 213 mg/dL, HDL-C 50 mg/dL, untreated systolic BP 120 mm Hg, nonsmoker, and without diabetes
Route::post('/aiSearch', [LocationController::class, 'aiSearch']);


Route::post('/clientRecord', [ClientRecordController::class, 'store']);



Route::group(['prefix' => 'admin'], function () {
    Route::get('/getAdmins', [UserController::class, 'getAdmins']);
    Route::post('/createAdmin', [UserController::class, 'createAdmin']);
    Route::get('/deleteAdmin', [UserController::class, 'deleteAdmin']);
    Route::post('/updateAdmin', [UserController::class, 'updateAdmin']);

});


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);


});



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/statistics', [StatisticsController::class, 'getStatistics']);
        Route::post('/deleteRecord', [ClientRecordController::class, 'delete']);
        Route::get('/getRecords', [ClientRecordController::class, 'index']);
        Route::get('/download-data', [DownloadController::class, 'downloadExcel']);
    });

});




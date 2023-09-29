<?php

use App\Http\Controllers\LocationController;
use App\Models\Location;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $htmlContent = File::get(public_path('site/index.html'));

    return response($htmlContent)->header('Content-Type', 'text/html');
});

Route::resource('location', LocationController::class);

Route::get('location/{location}', function (Location $location) {
    return view('locationProperety' , compact('location'));
  });

Route::get('/chat', function () {
    return view('gpt');
});


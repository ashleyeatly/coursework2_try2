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

Route::middleware(['auth'])->group(function(){
    Route::view('/admin','admin')->name('admin');
});

//Route::get('/doors', function(){
//    return route('index', \App\Http\Controllers\DoorController::class);
//});

Route::get('/doors', [\App\Http\Controllers\DoorController::class,'index'])
    ->name('doors.index');
//index    ->middleware('auth');

Route::get('/doors/{door}',[\App\Http\Controllers\DoorController::class,'show'])
    ->name('doors.show');
//    ->middleware('auth');

Route::get('/zones', [\App\Http\Controllers\ZoneController::class,'index'])
    ->name('zones.index');
//index    ->middleware('auth');

Route::get('/zones/{zone}',[\App\Http\Controllers\ZoneController::class,'show'])
    ->name('zones.show');
//    ->middleware('auth');

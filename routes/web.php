<?php

use App\Http\Controllers\DoorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
// Route is the PHP class which has all the route related methods
// ::
// get post etc. HTTP verb redirect
// '/' etc route or path uri
// fn called when user navigates to this route can accept parameters
// => what gets returned view or whatever
// editing routes/web.php this is not the correct way
// note {name?} makes parameter optional

Route::get('/', fn ()
=> view('welcome'))->name('welcome');


//Route::middleware(['auth'])->group(function(){
//    Route::view('/admin','admin')->name('admin');
//});

// is this the only place /admin is mentioned and protected
Route::middleware(['auth'])->group(fn ()
=> Route::view('/admin','admin')->name('admin'));

Route::get('/about', [\App\Http\Controllers\PageController::class,'about'])
    ->name('pages.about');
//->middleware('auth');

Route::get('/home', [\App\Http\Controllers\PageController::class,'index'])
    ->name('pages.index');
//->middleware('auth');

/**
 * doors
 */
Route::get('/doors/create', [\App\Http\Controllers\DoorController::class, 'create'])
    ->name('doors.create')->middleware('auth');

Route::get('doors/list', [\App\Http\Controllers\DoorController::class, 'getUsers'])
    ->name('doors.list')->middleware('auth');

Route::get('/doors', [\App\Http\Controllers\DoorController::class,'index'])
    ->name('doors.index') ->middleware('auth');

Route::get('/doors/{door}',[\App\Http\Controllers\DoorController::class,'show'])
    ->name('doors.show')->middleware('auth');

Route::post('/doors', [\App\Http\Controllers\DoorController::class, 'store'])
    ->name('doors.store')->middleware('auth');

Route::delete('/doors/{door}',[\App\Http\Controllers\DoorController::class,'destroy'])
    ->name('doors.destroy')->middleware('auth');

/**
 * zones
 */
Route::get('/zones/create', [ZoneController::class, 'create'])
    ->name('zones.create')->middleware('auth');

Route::get('zones/list', [ZoneController::class, 'getUsers'])
    ->name('zones.list');

Route::get('/zones', [\App\Http\Controllers\ZoneController::class,'index'])
    ->name('zones.index')->middleware('auth');

Route::get('/zones/{zone}',[\App\Http\Controllers\ZoneController::class,'show'])
    ->name('zones.show')->middleware('auth');

Route::post('/zones', [ZoneController::class, 'store'])
    ->name('zones.store')->middleware('auth');

Route::delete('/zones/{zone}',[ZoneController::class,'destroy'])
    ->name('zones.destroy')->middleware('auth');

/**
 * users
 * watch the order
 */
Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create')->middleware('auth');

Route::get('users/list', [UserController::class, 'getUsers'])
    ->name('users.list');

Route::get('/users/{user}',[\App\Http\Controllers\UserController::class,'show'])
    ->name('users.show')->middleware('auth');

Route::get('/users', [\App\Http\Controllers\UserController::class,'index'])
    ->name('users.index')->middleware('auth');

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store')->middleware('auth');

Route::delete('/users/{user}',[UserController::class,'destroy'])
    ->name('users.destroy')->middleware('auth');


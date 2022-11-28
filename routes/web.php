<?php

use App\Http\Controllers\UserController;
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
=> view('welcome'));


//Route::middleware(['auth'])->group(function(){
//    Route::view('/admin','admin')->name('admin');
//});

Route::middleware(['auth'])->group(fn ()
=> Route::view('/admin','admin')->name('admin'));

//Route::get('/doors', function(){
//    return route('index', \App\Http\Controllers\DoorController::class);
//});

//Route::get('/doors', [\App\Http\Controllers\DoorController::class,'index'])
//    ->name('doors.index');
////index    ->middleware('auth');
Route::get('/about', [\App\Http\Controllers\PageController::class,'about'])
    ->name('pages.about');
//->middleware('auth');

Route::get('/home', [\App\Http\Controllers\PageController::class,'index'])
    ->name('pages.index');
//->middleware('auth');

Route::get('/doors', [\App\Http\Controllers\DoorController::class,'index'])
    ->name('doors.index') ->middleware('auth');

Route::get('/doors/{door}',[\App\Http\Controllers\DoorController::class,'show'])
    ->name('doors.show')->middleware('auth');

Route::get('/zones', [\App\Http\Controllers\ZoneController::class,'index'])
    ->name('zones.index')->middleware('auth');

Route::get('/zones/{zone}',[\App\Http\Controllers\ZoneController::class,'show'])
    ->name('zones.show')->middleware('auth');

Route::get('/users', [\App\Http\Controllers\UserController::class,'index'])
    ->name('users.index')->middleware('auth');

Route::get('/users/{user}',[\App\Http\Controllers\UserController::class,'show'])
    ->name('users.show')->middleware('auth');

Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create')->middleware('auth');

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store')->middleware('auth');

Route::get('users/list', [UserController::class, 'getUsers'])
    ->name('user.list');

Route::delete('/users/{user}',[UserController::class,'destroy'])
    ->name('users.destroy')->middleware('auth');


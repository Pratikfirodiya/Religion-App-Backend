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
    return view('auth.login');
});
Route::get('/AddReligionData', function () {
    return view('admin.AddReligionData');
});
Route::get('/admin', function () {
    return view('admin.Dashoboard');
});


Route::Post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userlist','Web\DashboarController@getallusers');
Route::get('/map','Web\DashboarController@showpendingarticles');
Route::put('/articlesupdate/{article_id}','Web\DashboarController@articlesupdate');
Route::get('/adddata','Web\DashboarController@adddata');

//Route::post('adddata', [DashboarController::class, 'adddata'])->name('adddata');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

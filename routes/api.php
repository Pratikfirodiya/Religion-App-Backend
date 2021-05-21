<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('getallusers','Api\AuthController@getallusers');
Route::post('store','Api\ReligionController@store');
Route::get('show','Api\ReligionController@show');
Route::post('storedfestivaldata','Api\FestivalController@storedfestivaldata');
Route::post('storedoccasiondata','Api\FestivalController@storedoccasiondata');
Route::post('fetchreligion','Api\FestivalController@fetchreligion');
Route::post('storeddata','Api\AllController@storeddata');
Route::post('storeimages','Api\AllController@storeimages');
Route::post('storearticles','Api\ArticleController@storearticles');
Route::post('showarticlesbyid','Api\ArticleController@showarticlesbyid');
Route::get('showallarticles','Api\ArticleController@showallarticles');
Route::get('showpendingarticles','Api\ArticleController@showpendingarticles');
Route::post('validatearticles','Api\ArticleController@validatearticles');
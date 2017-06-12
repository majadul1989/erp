<?php

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
Route::group(['middleware'=>'auth'],function(){
Route::get('/Add_Branch','Add_Branch@index');
Route::post('/insert','Add_Branch@insert');
Route::get('/Branch_list','Branch_list@index');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

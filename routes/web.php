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
// Branch ADD and Create and Read controller CR 
Route::get('/Add_Branch','Add_Branch@index');
Route::post('/insert','Add_Branch@insert');
// Branch List update  and delete controller UD 
Route::get('/Branch_list','Branch_list@index');
Route::get('/edit','Branch_list@edit');
Route::POST('/update/{id}','Branch_list@update');
Route::get('/delete/{id}','Branch_list@delete');
// Download excel sheet from brach
Route::get('downloadExcel/{type}', 'Branch_list@downloadExcel');
Route::get('pdfview',array('as'=>'pdfview','uses'=>'Branch_list@pdfview'));

//search functions
Route::get('search','Branch_list@search');
Route::get('/view/{view}','Branch_list@view');
// Route::get('pdfview', 'Branch_list@pdfview');



});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

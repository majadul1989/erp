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

//***************** User Functions*******************// 
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
//Live search functions
Route::get('search','Branch_list@search');
Route::get('/view/{view}','Branch_list@view');


//***************** User Functions*******************// 
Route::get('/employee_list','employee_list@index');
// Excel functions
Route::get('userExcel/{type}', 'employee_list@userExcel');
// PDF Functions
Route::get('UserPdfView',array('as'=>'UserPdfView','uses'=>'employee_list@UserPdfView'));
//Live search functions
Route::get('userSearch','employee_list@userSearch');
// User View functions
Route::get('/UserView/{user_info}','employee_list@UserView');
//User Edit function
Route::get('/UserEdit','employee_list@UserEdit');
// Delete Functions
Route::get('/EmpDelete/{id}','employee_list@EmpDelete');
// Update functions
Route::POST('/userUpdate/{id}','employee_list@userUpdate');
//Create_customer fucntions //


//***************** Customer Functions*******************//
Route::get('/Create_customer','Create_customer@index');
Route::post('/CTR_insert','Create_customer@CTR_insert');
Route::get('/Customer_list','Customer_list@index');
// Excel functions
Route::get('customerExcel/{type}', 'Customer_list@customerExcel');
// PDF Functions
Route::get('/customerPdfView',array('as'=>'customerPdfView','uses'=>'Customer_list@customerPdfView'));
//Live search functions
Route::get('CST_search','Customer_list@CST_search');
// Customer View functions
Route::get('/customer_view/{customer_info}','Customer_list@customer_view');



//***************** Company Functions*******************//
// Company Functions
Route::get('/Add_Company','Add_Company@index');
Route::post('/CMP_insert','Add_Company@CMP_insert');




}); // Author Function End
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

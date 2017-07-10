<?php

namespace App\Http\Controllers;
use App\company;
use App\User;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Purchase extends Controller
{
public function index(){
	$companies = new company();
	$companies_list = $companies->company_lists();
	return view('admin.purchase',['companies_list' => $companies_list]);
} // Index

public function ps_insert(Request $request){
	echo "<pre>";
	print_r($_POST);
		// Getting all post data for validation
		$validator = Validator::make($request->all(), [
					'company_ps_id' => 'required',
		            'product_brand' => 'required',
		            'product_name' => 'required',
		            'product_code' => 'required',
		            'product_type' => 'required',
		            'product_quantity' => 'required',
		            'product_p_price' => 'required',
		            'product_sale_price' => 'required',
		        ]);

	    if ($validator->fails()) {
	        return redirect('Purchase')
	                    ->withErrors($validator)
	                    ->withInput();
	    } //validator
	//get user id function
    //**** User ID get from session*******//
    $purchase_user_id = Auth::user()->id;
    // Get input Field
    $company_ps_id2 = $request->input('company_ps_id');
    // Validation input in special charter form
    $company_ps_id = filter_var($company_ps_id2, FILTER_SANITIZE_STRING); 
    // Get input Field
    $product_brand2 = $request->input('product_brand');
    // Validation input in special charter form
    $product_brand = filter_var($product_brand2, FILTER_SANITIZE_STRING); 
    // Get input Field
    $product_name2 = $request->input('product_name');
    // Validation input in special charter form
    $product_name = filter_var($product_name2, FILTER_SANITIZE_STRING);
    // Get input Field
    $product_code2 = $request->input('product_code');
    // Validation input in special charter form
    $product_code = filter_var($product_code2, FILTER_SANITIZE_STRING);
    // Get input Field
    $product_type2 = $request->input('product_type');
    // Validation input in special charter form
    $product_type = filter_var($product_type2, FILTER_SANITIZE_STRING);
    // Get input Field
    $per_field2 = $request->input('per_field');
    // Validation input in special charter form
    $per_field = filter_var($per_field2, FILTER_SANITIZE_STRING);   
    // Get input Field
    $product_quantity2 = $request->input('product_quantity');
    // Validation input in special charter form
    $product_quantity = filter_var($product_quantity2, FILTER_SANITIZE_STRING);
    // Get input Field
    $product_p_price2 = $request->input('product_p_price');
    // Validation input in special charter form
    $product_p_price = filter_var($product_p_price2, FILTER_SANITIZE_STRING);
    // Get input Field
    $product_sale_price2 = $request->input('product_sale_price');
    // Validation input in special charter form
    $product_sale_price = filter_var($product_sale_price2, FILTER_SANITIZE_STRING);
    // Default Asian Date and Time
    date_default_timezone_set("Asia/Dhaka");
    // Get a variable for date & time 
    $product_created = date('Y-m-d H:i:s'); 
    // Get a variable for date
    $product_date = date('Y-m-d');
    //insert Data
    $db = DB::table('purchases')->insert(
            [
            'company_ps_id' 	 => $company_ps_id,
            'product_brand' 	 => $product_brand,
            'product_name' 	 	 => $product_name,
            'product_code' 	 	 => $product_code,
            'product_type' 	 	 => $product_type,
            'per_field' 		 => $per_field,
            'product_quantity' 	 => $product_quantity,
            'product_p_price' 	 => $product_p_price,
            'product_sale_price' => $product_sale_price,
            'purchase_user_id' 	 => $purchase_user_id,
            'product_date' 		 => $product_date,
            'product_created' 	 => $product_created,
            'product_updated' 	 => $product_created,

            ]
        );
    if ($db == TRUE) {
    	return Redirect::back()->with('message','Purchase Successfuly !');
    }else{
    	return Redirect::back()->with('message','Purchase Do Not Successfuly !');
    }

        
} //ps_insert


} //Purchase

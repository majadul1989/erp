<?php

namespace App\Http\Controllers;
use Validator;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class Create_customer extends Controller
{
public function index(){
 return view('admin.customer');
} // index

public function CTR_insert(request $request){
		// Getting all post data
		$validator = Validator::make($request->all(), [
		            'customer_name' => 'required|unique:create_customers',
		            'customer_mail' => 'required|unique:create_customers|email',
		            'customer_mobile' => 'required|unique:create_customers|numeric|min:11',
		            'customer_address' => 'max:500',
		        ]);

	    if ($validator->fails()) {
	        return redirect('Create_customer')
	                    ->withErrors($validator)
	                    ->withInput();
	    }

		//get user id function
	    //**** User ID get from session*******//
	    $create_user_id = Auth::user()->id; 
	    //**** Get Branch ID get from session*******//
	    $customer_branch_id = Auth::user()->branch_city_id; 
	    // Get input Field
	    $customer_name2 = $request->input('customer_name');
	    // Validation input in special charter form
	    $customer_name = filter_var($customer_name2, FILTER_SANITIZE_STRING); 
	    // Get input Field
	    $customer_mail2 = $request->input('customer_mail');
	    // Validation input in special charter form
	    $customer_mail = filter_var($customer_mail2, FILTER_SANITIZE_STRING); 
	    // Get input Field
	    $customer_mobile2 = $request->input('customer_mobile');
	    // Validation input in special charter form
	    $customer_mobile = filter_var($customer_mobile2, FILTER_SANITIZE_STRING);
	    // Get input Field
	    $customer_address2 = $request->input('customer_address');
	    // Validation input in special charter form
	    $customer_address = filter_var($customer_address2, FILTER_SANITIZE_STRING);
	    // Default Asian Date and Time
	    date_default_timezone_set("Asia/Dhaka");
	    // Get a variable for date & time 
	    $created = date('Y-m-d H:i:s'); 
	    // Get a variable for date
	    $the_date = date('Y-m-d'); 

	$db = DB::table('create_customers')->insert(
	        [
	        'customer_name' 	 => $customer_name,
	        'customer_mobile' 	 => $customer_mobile,
	        'customer_mail' 	 => $customer_mail,
	        'customer_address' 	 => $customer_address,
	        'create_user_id' 	 => $create_user_id,
	        'customer_branch_id' => $customer_branch_id,
	        'the_date' 			 => $the_date,
	        'created' 			 => $created,
	        'updated' 			 => $created,

	        ]
	    );
	if ($db == TRUE) {
		return Redirect::back()->with('message','Customers Successfuly Added !');
	}else{
		return Redirect::back()->with('message','Customers Do Not Successfuly Added !');
	}

}//CTR_insert

} //Create_customer

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

class Add_Company extends Controller
{
public function index(){
return view('admin.add_company');
} //index

public function CMP_insert(request $request){
		// Getting all post data
		$validator = Validator::make($request->all(), [
		            'company_name' => 'required|unique:companies',
		            'company_mail' => 'required|unique:companies|email',
		            'company_mobile' => 'required|unique:companies|numeric|min:11',
		            'company_address' => 'max:500',
		        ]);

	    if ($validator->fails()) {
	        return redirect('Add_Company')
	                    ->withErrors($validator)
	                    ->withInput();
	    }

		//get user id function
	    //**** User ID get from session*******//
	    $create_user_id = Auth::user()->id;
	    // Get input Field
	    $company_name2 = $request->input('company_name');
	    // Validation input in special charter form
	    $company_name = filter_var($company_name2, FILTER_SANITIZE_STRING); 
	    // Get input Field
	    $company_mail2 = $request->input('company_mail');
	    // Validation input in special charter form
	    $company_mail = filter_var($company_mail2, FILTER_SANITIZE_STRING); 
	    // Get input Field
	    $company_mobile2 = $request->input('company_mobile');
	    // Validation input in special charter form
	    $company_mobile = filter_var($company_mobile2, FILTER_SANITIZE_STRING);
	    // Get input Field
	    $company_address2 = $request->input('company_address');
	    // Validation input in special charter form
	    $company_address = filter_var($company_address2, FILTER_SANITIZE_STRING);
	    // Default Asian Date and Time
	    date_default_timezone_set("Asia/Dhaka");
	    // Get a variable for date & time 
	    $created = date('Y-m-d H:i:s'); 
	    // Get a variable for date
	    $the_date = date('Y-m-d'); 

	$db = DB::table('companies')->insert(
	        [
	        'company_name' 	 		=> $company_name,
	        'company_mobile' 	 	=> $company_mobile,
	        'company_mail' 	 		=> $company_mail,
	        'company_address' 	 	=> $company_address,
	        'company_create_user_id' => $create_user_id,
	        'company_date' 			 => $the_date,
	        'company_created' 		=> $created,
	        'company_updated' 		=> $created,

	        ]
	    );
	if ($db == TRUE) {
		return Redirect::back()->with('message','Companies Successfuly Added !');
	}else{
		return Redirect::back()->with('message','Companies Do Not Successfuly Added !');
	}

}//CTR_insert

} //Add_Company

<?php

namespace App\Http\Controllers;
use Validator;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class Add_Branch extends Controller
{

public function index(){
     return view('admin.add_branch');
}

public function insert(Request $request){
	// Getting all post data
	$validator = Validator::make($request->all(), [
	            'branch_name' => 'required|unique:branches',
	            'branch_email' => 'required|unique:branches|email',
	            'branch_phone' => 'required|unique:branches|numeric|min:11',
	            'branch_address' => 'required|max:255',
	            'branch_city' => 'required',
	            'branch_description' => 'max:255',
	        ]);

    if ($validator->fails()) {
        return redirect('Add_Branch')
                    ->withErrors($validator)
                    ->withInput();
    }
// get user id function
    $userId = Auth::user()->id; // User ID get from session;
    $branch_name2 = $request->input('branch_name');
    $branch_name = filter_var($branch_name2, FILTER_SANITIZE_STRING); // Validation input in special charter form
	$branch_email2 = $request->input('branch_email');
    $branch_email = filter_var($branch_email2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $branch_phone2 = $request->input('branch_phone');
    $branch_phone = filter_var($branch_phone2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $branch_address2 = $request->input('branch_address');
    $branch_address = filter_var($branch_address2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $branch_city2 = $request->input('branch_city');
    $branch_city = filter_var($branch_city2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $branch_description2 = $request->input('branch_description');
    $branch_description = filter_var($branch_description2, FILTER_SANITIZE_STRING); // Validation input in special charter form
   
   date_default_timezone_set("Asia/Dhaka"); // Default Asian Date and Time
  $created_at = date('Y-m-d H:i:s');


$db = DB::table('branches')->insert(
        [
        'branch_name' => $branch_name,
        'branch_email' => $branch_email,
        'branch_phone' => $branch_phone,
        'branch_address' => $branch_address,
        'branch_city' => $branch_city,
        'branch_description' => $branch_description,
        'user_id' => $userId,
        'branch_create_date' => $created_at,
        'branch_update_date' => $created_at,

        ]
    );
if ($db) {
	return redirect('Add_Branch');
}

}

}

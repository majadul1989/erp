<?php

namespace App\Http\Controllers;
use Validator;
use DB;
use App\Departments;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;

class Department extends Controller
{
public function index(){
	$department_list2 = new departments();
	$departmentes = $department_list2->department_list();
	// print_r($departmentes);
 return view('admin.department', ['departmentes' => $departmentes]);
} // index

public function insert(Request $request){
		$validator = Validator::make($request->all(), [
		            'department' => 'required|unique:departments',

		        ]);

	    if ($validator->fails()) {
	        return redirect('Department')
	                    ->withErrors($validator)
	                    ->withInput();
	    }
	  $department2 = $request->Input('department');
	  $department  = filter_var($department2 , FILTER_SANITIZE_STRING); // Validation input in special charter form
	   date_default_timezone_set("Asia/Dhaka"); // Default Asian Date and Time
	  $created_at = date('Y-m-d H:i:s');
	$db = DB::table('departments')->insert(
	          [
	          'department' => $department,
	          'created_at' => $created_at,
	          'updated_at' => $created_at,

	          ]
	      );
	  if ($db) {
	  	return Redirect::back()->with('message','Departments Successfuly Added !');
	  }

	}// insert


public function DPT_edit(Request $Request, $DPT_edit){

	$edit_id = $Request->DPT_edit; // Here catch a variable for url 
	$departmentes = DB::table('departments')
		 			->where('id', $edit_id) // Here use a condition
					->first();
	return view('admin.edit.department', ['departmentes' => $departmentes]); ; // Here return all data by json formet

}//DPT_edit



}

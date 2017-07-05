<?php

namespace App\Http\Controllers;
use App\User;
use App\Branches;
use DB;
use Excel;
use App;
use PDF;
use Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class employee_list extends Controller
{
  public function index(){
  	$show_user2 = new User();
  	$data['show_users'] = $show_user2->show_user();
  	$show_user_for_edit2 = new User();
  	$data['show_user_for_edit'] = $show_user_for_edit2->show_user_for_edit();
  	return view('admin.employee_list', ['data' => $data]);
  }//index

  // Download Excel sheet functions

  public function userExcel(Request $request, $type)
  {
  	$data = User::get()->toArray();
  	return Excel::create('User List', function($excel) use ($data) {
  		$excel->sheet('mySheet', function($sheet) use ($data)
          {
  			$sheet->fromArray($data);

          });

  	})->download($type);
  }

  // print functions
  public function UserPdfView(Request $request){
  	    $items = DB::table("Users")
			  	    ->join('branches', 'branches.branch_id', '=', 'users.branch_city_id')
  	    			->get();

  	    view()->share('items',$items);


  	    if($request->has('download')){

  	        $pdf = PDF::loadView('admin.PDF.user');

  	        $pdf->output();
  	        $dom_pdf = $pdf->getDomPDF();

  	        $canvas = $dom_pdf ->get_canvas();
  	        $canvas->page_text(540, 760, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 8, array(0, 0, 100));
  	        $canvas->get_width();
  	        return $pdf->download('Users.pdf');

  	    }


  	    return view('admin.PDF.user');

  	} //pdfview

  	//Live search functions here
  	public function userSearch(Request $request){
  			$search = $_GET['userSearch'];
  			$Users = User::where('name', 'LIKE', '%'.$search.'%')
  			->orWhere("id", "LIKE", '%'.$search.'%')
  			->get();
  			echo "<ul class='table'>";
  			foreach ($Users as $key => $User) {
  				echo "<li><a href='".url('/UserView/').'/'.$User->id."'>";
  			 	echo $User->name;
  			 	echo "</a></li>";
  			 } // Here return all data by json formet
  			 echo "</ul>";
  			// echo "<pre>";
  			//print_r($branch);
  			
  		}//end of search function

  	public function UserView(Request $Request, $user_info){
  		echo $Request->user_info;
  	}

// Edit Function 
  	public function UserEdit(Request $Request){ // Request to show data for edit by ajax functions
  		$user_id = $_GET['edit_id'];// Here catch a variable for url
  		$editUser = DB::table('users')
  			 			->where('id', $user_id) // Here use a condition
  						->join('Branches', 'Branches.branch_id', '=', 'users.branch_city_id')  // Here Joning data with user table
  						->first();
  		return response()->json($editUser); // Here return all data by json formet
  		
  	}


  	//Employee Delete data functions
  	public function EmpDelete($branch_delete_id){
  						$delete = DB::table('users')
  				 			->where('id', $branch_delete_id)
  							->delete();
  		return Redirect::back()->with('message','Employee Deleted !');
  	} //Branch Delete data functions

  	// Update functions 
  	public function userUpdate(Request $request, $userUpdatId){
  		       $name2 = $request->input('name');
  		       $name = filter_var($name2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		   	   $email2 = $request->input('email');
  		       $email = filter_var($email2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $phone2 = $request->input('phone');
  		       $phone = filter_var($phone2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $branch_address2 = $request->input('branch_address');
  		       $branch_address = filter_var($branch_address2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $branch_city2 = $request->input('branch_city_id');
  		       $branch_city = filter_var($branch_city2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $password2 = $request->input('password');
  		       $password = filter_var($password2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $branch_description2 = $request->input('branch_description');
  		       $branch_description = filter_var($branch_description2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $pursech2 = $request->input('pursech');
  		       $pursech = filter_var($pursech2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $sales2 = $request->input('sales');
  		       $sales = filter_var($sales2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $return2 = $request->input('return');
  		       $return = filter_var($return2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $sales_history2 = $request->input('sales_history');
  		       $sales_history = filter_var($sales_history2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $accounts2 = $request->input('accounts');
  		       $accounts = filter_var($accounts2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $employee2 = $request->input('employee');
  		       $employee = filter_var($employee2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       $all_branch2 = $request->input('all_branch');
  		       $all_branch = filter_var($all_branch2, FILTER_SANITIZE_STRING); // Validation input in special charter form
  		       date_default_timezone_set("Asia/Dhaka"); // Default Asian Date and Time
  		       $created_at = date('Y-m-d H:i:s');
  		     	// Here is query for get data from database in branch table
  		   	$branches = DB::table('users')
  		   			  ->where('id', $userUpdatId)
  		   			  ->first();
  		   	// here get variable to new data
  		   	$data['name'] = $name; 
  		   	// here get variable to old data
  		   	$data_old['name'] = $branches->name; 
  		   	// here get variable to new data
  		   	$data['email'] = $email; 
  		   	// here get variable to old data
  		   	$data_old['email'] = $branches->email;
  		   	// here get variable to new data
 			$data['phone'] = $phone;
  		   	// here get variable to old data
  		   	$data_old['phone'] = $branches->phone;
  		   	// here get variable to new data
  		   	$data['password'] = $password;
  		   	// here get variable to old data
  		   	$data_old['password'] = $branches->password;
  		   	// here get variable to new data
 			$data['address'] = $branch_address;
  		   	// here get variable to old data
  		   	$data_old['address'] = $branches->address;
  		   	// here get variable to new data
 			$data['branch_city_id'] = $branch_city;
  		   	// here get variable to old data
  		   	$data_old['branch_city_id'] = $branches->branch_city_id;
  		   	// here get variable to new data
 			$data['pursech'] = $pursech;
  		   	// here get variable to old data
  		   	$data_old['pursech'] = $branches->pursech;
  		   	// here get variable to new data
 			$data['sales'] = $sales;
  		   	// here get variable to old data
  		   	$data_old['sales'] = $branches->sales;
  		   	// here get variable to new data
 			$data['return'] = $return;
  		   	// here get variable to old data
  		   	$data_old['return'] = $branches->return;
  		   	// here get variable to new data
 			$data['sales_history'] = $sales_history;
  		   	// here get variable to old data
  		   	$data_old['sales_history'] = $branches->sales_history;
  		   	// here get variable to new data
 			$data['accounts'] = $accounts;
  		   	// here get variable to old data
  		   	$data_old['accounts'] = $branches->accounts;
  		   	// here get variable to new data
 			$data['employee'] = $employee;
  		   	// here get variable to old data
  		   	$data_old['employee'] = $branches->employee;
  		   	// here get variable to new data
 			$data['all_branch'] = $all_branch;
  		   	// here get variable to old data
  		   	$data_old['all_branch'] = $branches->all_branch;
  		   	
  		// Data check here same or not
  		if ($data['name'] != $data_old['name'] ) { 
  			$validator = Validator::make($request->all(), [
  			            'name' => 'required|unique:users',
  			            ]);
  			if ($validator->fails()) {
		        return redirect('register')
		        	->withErrors($validator)
		        	->withInput();
  			     }// $validator->fails()
  			
  		} // Data not same condition
  		// Data check here same or not
  		if ($data['email'] != $data_old['email'] ) { 
  			$validator = Validator::make($request->all(), [
  			            'email' => 'required|unique:users',
  			            ]);
  			if ($validator->fails()) {
		        return redirect('register')
		        	->withErrors($validator)
		        	->withInput();
  			     }// $validator->fails()
  			
  		} // Data not same condition
  		// Data check here same or not
  		if ($data['phone'] != $data_old['phone'] ) { 
  			$validator = Validator::make($request->all(), [
  			            'phone' => 'required|unique:users',
  			            ]);
  			if ($validator->fails()) {
		        return redirect('register')
		        	->withErrors($validator)
		        	->withInput();
  			     }// $validator->fails()
  			
  		} // Data not same condition

  		// Data check here same or not
		$data['password'] == "" ? $data['password'] = $branches->password : $password = $password;
  		// Data not same condition
  		$data['pursech'] != $data_old['pursech'] ? $pursech = $pursech : $pursech = $branches->pursech;
  		// Data not same condition
  		$data['sales'] != $data_old['sales'] ? $sales = $sales : $sales = $branches->sales;
  		// Data not same condition
  		$data['return'] != $data_old['return'] ? $return  = $return : $return = $branches->return;
  		// Data not same condition
  		$data['sales_history'] != $data_old['sales_history'] ? $sales_history  = $sales_history : $sales_history = $branches->sales_history;
  		// Data not same condition
  		$data['accounts'] != $data_old['accounts'] ? $accounts  = $accounts : $accounts = $branches->accounts;
  		// Data not same condition
  		$data['employee'] != $data_old['employee'] ? $employee  = $employee : $employee = $branches->employee;
  		// Data not same condition
  		$data['all_branch'] != $data_old['all_branch'] ? $all_branch  = $all_branch : $all_branch = $branches->all_branch;
$user_update = DB::table('users')
			        ->where('id', $userUpdatId)
			        ->update([
			        'name'          => $name,
		            'email'         => $email,
		            'phone'         => $phone,
		            'password'      => bcrypt($password),
		            'address'       => $branch_address,
		            'branch_city_id'=> $branch_city,
		            'pursech'       => $pursech,
		            'sales'         => $sales,
		            'return'        => $return,
		            'sales_history' => $sales_history,
		            'accounts'      => $accounts,
		            'employee'      => $employee,
		            'all_branch'    => $all_branch,
		            'updated_at'    => $created_at,
	            	]);
if ($user_update == TRUE) {
	return Redirect::back()->with('message','User Data Updated Successful !');
}else{
	return Redirect::back()->with('message','User Data Do Not Updated Successful !');
}

} // user update functions


} //employee_list

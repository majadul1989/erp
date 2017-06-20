<?php

namespace App\Http\Controllers;
use App\Branches;
use App\User;
use DB;
use Excel;
use App;
use PDF;
use Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Branch_list extends Controller
{

public function index(){
	$branch_list2 = new Branches();
	$branch_list = $branch_list2->branchRelation();
	
	return view('admin.branch_list', ['branch_list' => $branch_list]);
}

public function edit(Request $Request){ // Request to show data for edit by ajax functions
	$edit_id = $_GET['edit_id'];
	$branch_edit_id =  $Request->edit_id; // Here catch a variable for url 
	$branches = DB::table('Branches')
		 			->where('branch_id', $branch_edit_id) // Here use a condition
					->join('Users', 'users.id', '=', 'Branches.user_id')  // Here Joning data with user table
					->first();
	return response()->json($branches); // Here return all data by json formet
	
}

public function update(Request $request, $branch_edit_id){
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
  	// Here is query for get data from database in branch table
	$branches = DB::table('Branches')
			 			->where('branch_id', $branch_edit_id)
						->first();
   
	// echo "<pre>";
	// print_r($branches);
	$data['branch_name'] = $branch_name; // here get variable to new data
	$data_old['branch_name'] = $branches->branch_name; // here get variable to old data
	$data['branch_email'] = $branch_email; // here get variable to new data
	$data_old['branch_email'] = $branches->branch_email; // here get variable to old data
	$data['branch_phone'] = $branch_phone; // here get variable to new data
	$data_old['branch_phone'] = $branches->branch_phone; // here get variable to old data
	// echo "<per>";
	// print_r($data);

	if ($data['branch_name'] != $data_old['branch_name'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'branch_name' => 'required|unique:branches',
		            ]);
		if ($validator->fails()) {
		        return redirect('Add_Branch')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

	if ($data['branch_email'] != $data_old['branch_email'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'branch_email' => 'required|unique:branches',
		            ]);
		if ($validator->fails()) {
		        return redirect('Add_Branch')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

	if ($data['branch_phone'] != $data_old['branch_phone'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'branch_phone' => 'required|unique:branches',
		            ]);
		if ($validator->fails()) {
		        return redirect('Add_Branch')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

//Branch update data query here

$branch_update = DB::table('Branches')
			        ->where('branch_id', $branch_edit_id)
			        ->update([
	            	'branch_name' => $branch_name,
	            	'branch_email' => $branch_email,
	            	'branch_phone' => $branch_phone,
	            	'branch_address' => $branch_address,
	            	'branch_city' => $branch_city,
	            	'branch_description' => $branch_description,
	            	'branch_update_date' => $created_at,
	            	]);
if ($branch_update == TRUE) {
	return Redirect::back()->with('message','Branch Data Updated Successful !');
}

} //update

//Branch Delete data functions
public function delete($branch_delete_id){
					$delete = DB::table('Branches')
			 			->where('branch_id', $branch_delete_id)
						->delete();
	return Redirect::back()->with('message','Branch Deleted !');
} //Branch Delete data functions

// Download Excel sheet functions

public function downloadExcel(Request $request, $type)
{
	$data = Branches::get()->toArray();
	return Excel::create('Branch List', function($excel) use ($data) {
		$excel->sheet('mySheet', function($sheet) use ($data)
        {
			$sheet->fromArray($data);

        });

	})->download($type);
}

// print functions
public function pdfview(Request $request){
	    $items = DB::table("Branches")->get();

	    view()->share('items',$items);


	    if($request->has('download')){

	        $pdf = PDF::loadView('admin.pdfview');

	        $pdf->output();
	        $dom_pdf = $pdf->getDomPDF();

	        $canvas = $dom_pdf ->get_canvas();
	        $canvas->page_text(540, 760, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 8, array(0, 0, 100));
	        $canvas->get_width();
	        return $pdf->download('Branches.pdf');

	    }


	    return view('admin.pdfview');

	} //pdfview

} //end of Branch_list controller



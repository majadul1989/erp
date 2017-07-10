<?php

namespace App\Http\Controllers;
use App\Create_customer;
use App\User;
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

class Customer_list extends Controller
{
	public function index(){
		$customers = new Create_customer();
		$customer_list = $customers->customer_lists();
		return view('admin.customer_list', ['customer_list'=> $customer_list]);
	} // index

	// Download Excel sheet functions

	public function customerExcel(Request $request, $type)
	{
		$data = Create_customer::get()->toArray();
		return Excel::create('Customers List', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);

	        });

		})->download($type);
	}

	// print functions
	public function customerPdfView(Request $request){
		    $items = DB::table("Create_customers")
		   				->join('branches', 'branches.branch_id', '=', 'create_customers.customer_branch_id')
		    			->get();

		    view()->share('items',$items);


		    if($request->has('download')){

		        $pdf = PDF::loadView('admin.PDF.Customer');

		        $pdf->output();
		        $dom_pdf = $pdf->getDomPDF();

		        $canvas = $dom_pdf ->get_canvas();
		        $canvas->page_text(540, 760, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 8, array(0, 0, 100));
		        $canvas->get_width();
		        return $pdf->download('Customers.pdf');

		    }


		    return view('admin.PDF.Customer');

		} //pdfview
//Live search functions here
    public function CST_search(Request $request){
        $CST_search = $_GET['search'];
        $customers = Create_customer::where('customer_name', 'LIKE', '%'.$CST_search.'%')
            ->orWhere("customer_id", "LIKE", '%'.$CST_search.'%')
            ->get();
        echo "<ul class='table'>";
        foreach ($customers as $key => $customer) {
            echo "<li><a href='".url('/customer_view/').'/'.$customer->customer_id."'>";
            echo $customer->customer_name;
            echo "</a></li>";
        } // Here return all data by json formet
        echo "</ul>";
        // echo "<pre>";
        //print_r($branch);

    }//end of search function

    public function customer_view(Request $Request, $customer_info){
        echo $Request->customer_info;
    }

public function customer_edit(Request $Request){ // Request to show data for edit by ajax functions
	$edit_id = $_GET['edit_id'];
	$customer_edit_id =  $Request->edit_id; // Here catch a variable for url 
	$branches = DB::table('create_customers')
		 			->where('customer_id', $customer_edit_id) // Here use a condition
					->join('Users', 'users.id', '=', 'create_customers.create_user_id')  // Here Joning data with user table
					->join('branches', 'branches.branch_id', '=', 'create_customers.customer_branch_id')  // Here Joning data with user table
					->first();
	return response()->json($branches); // Here return all data by json formet
	
} //customer_edit


public function customerUpdate(Request $request, $company_edit_id){
    $customer_name2 = $request->input('customer_name');
    $customer_name = filter_var($customer_name2, FILTER_SANITIZE_STRING); // Validation input in special charter form
	$customer_mail2 = $request->input('customer_mail');
    $customer_mail = filter_var($customer_mail2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $customer_mobile2 = $request->input('customer_mobile');
    $customer_mobile = filter_var($customer_mobile2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $customer_address2 = $request->input('customer_address');
    $customer_address = filter_var($customer_address2, FILTER_SANITIZE_STRING); // Validation input in special charter form
   	date_default_timezone_set("Asia/Dhaka"); // Default Asian Date and Time
  	$created_at = date('Y-m-d H:i:s');
  	// Here is query for get data from database in branch table
	$customers = DB::table('create_customers')
			 			->where('customer_id', $company_edit_id)
						->first();
   
	// echo "<pre>";
	// print_r($customers);
	$data['customer_name'] = $customer_name; // here get variable to new data
	$data_old['customer_name'] = $customers->customer_name; // here get variable to old data
	$data['customer_mail'] = $customer_mail; // here get variable to new data
	$data_old['customer_mail'] = $customers->customer_mail; // here get variable to old data
	$data['customer_mobile'] = $customer_mobile; // here get variable to new data
	$data_old['customer_mobile'] = $customers->customer_mobile; // here get variable to old data
	// echo "<per>";
	// print_r($data);

	if ($data['customer_name'] != $data_old['customer_name'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'customer_name' => 'required|unique:create_customers',
		            ]);
		if ($validator->fails()) {
		        return redirect('create_customer')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

	if ($data['customer_mail'] != $data_old['customer_mail'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'customer_mail' => 'required|unique:create_customers',
		            ]);
		if ($validator->fails()) {
		        return redirect('create_customer')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

	if ($data['customer_mobile'] != $data_old['customer_mobile'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'customer_mobile' => 'required|unique:create_customers',
		            ]);
		if ($validator->fails()) {
		        return redirect('create_customer')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

	//Update data query here

	$branch_update = DB::table('create_customers')
			 			->where('customer_id', $company_edit_id)
				        ->update([
		            	'customer_name' => $customer_name,
		            	'customer_mail' => $customer_mail,
		            	'customer_mobile' => $customer_mobile,
		            	'customer_address' => $customer_address,
		            	'updated' => $created_at,
		            	]);
	if ($branch_update == TRUE) {
		return Redirect::back()->with('message','Customer Data Updated Successful !');
	}else{
		return Redirect::back()->with('message','Customer Data Do Not Updated Successful !');

	}

	} //update

	//Delete data functions
	public function customer_delete($customer_delete_id){
						$delete = DB::table('create_customers')
				 			->where('customer_id', $customer_delete_id)
							->delete();
		return Redirect::back()->with('message','Customer Deleted !');
	} //Branch Delete data functions


}

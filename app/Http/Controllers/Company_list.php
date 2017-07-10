<?php

namespace App\Http\Controllers;
use App\company;
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

class Company_list extends Controller
{
	public function index(){
		$companies = new company();
		$companies_list = $companies->company_lists();
		return view('admin.Company_list', ['companies_list'=> $companies_list]);
	} // index

	// Download Excel sheet functions

	public function companyExcel(Request $request, $type)
	{
		$data = company::get()->toArray();
		return Excel::create('Company List', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);

	        });

		})->download($type);
	}

	// print functions
	public function companyPdfView(Request $request){
		    $items = DB::table("companies")
		    			->get();

		    view()->share('items',$items);


		    if($request->has('download')){

		        $pdf = PDF::loadView('admin.PDF.Company');

		        $pdf->output();
		        $dom_pdf = $pdf->getDomPDF();

		        $canvas = $dom_pdf ->get_canvas();
		        $canvas->page_text(540, 760, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 8, array(0, 0, 100));
		        $canvas->get_width();
		        return $pdf->download('Companys.pdf');

		    }


		    return view('admin.PDF.Company');

		} //pdfview
//Live search functions here
    public function CMP_search(Request $request){
        $CMP_search = $_GET['search'];
        $companies = company::where('company_name', 'LIKE', '%'.$CMP_search.'%')
            ->orWhere("company_id", "LIKE", '%'.$CMP_search.'%')
            ->get();
        echo "<ul class='table'>";
        foreach ($companies as $key => $company) {
            echo "<li><a href='".url('/company_view/').'/'.$company->company_id."'>";
            echo $company->company_name;
            echo "</a></li>";
        } // Here return all data by json formet
        echo "</ul>";
        // echo "<pre>";
        //print_r($branch);

    }//end of search function

    public function company_view(Request $Request, $company_info){
        echo $Request->company_info;
    }

public function company_edit(Request $Request){ // Request to show data for edit by ajax functions
	$edit_id = $_GET['edit_id'];
	$branch_edit_id =  $Request->edit_id; // Here catch a variable for url 
	$branches = DB::table('Companies')
		 			->where('company_id', $branch_edit_id) // Here use a condition
					->join('Users', 'users.id', '=', 'Companies.company_create_user_id')  // Here Joning data with user table
					->first();
	return response()->json($branches); // Here return all data by json formet
	
}



//Branch Delete data functions
public function company_delete($branch_delete_id){
					$delete = DB::table('Companies')
			 			->where('company_id', $branch_delete_id)
						->delete();
	return Redirect::back()->with('message','Company Deleted !');
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


public function companyUpdate(Request $request, $company_edit_id){
    $company_name2 = $request->input('company_name');
    $company_name = filter_var($company_name2, FILTER_SANITIZE_STRING); // Validation input in special charter form
	$company_email2 = $request->input('company_mail');
    $company_email = filter_var($company_email2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $company_mobile2 = $request->input('company_mobile');
    $company_mobile = filter_var($company_mobile2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $company_address2 = $request->input('company_address');
    $company_address = filter_var($company_address2, FILTER_SANITIZE_STRING); // Validation input in special charter form
   	date_default_timezone_set("Asia/Dhaka"); // Default Asian Date and Time
  	$created_at = date('Y-m-d H:i:s');
  	// Here is query for get data from database in branch table
	$companies = DB::table('Companies')
			 			->where('company_id', $company_edit_id)
						->first();
   
	// echo "<pre>";
	// print_r($companies);
	$data['company_name'] = $company_name; // here get variable to new data
	$data_old['company_name'] = $companies->company_name; // here get variable to old data
	$data['company_mail'] = $company_email; // here get variable to new data
	$data_old['company_mail'] = $companies->company_mail; // here get variable to old data
	$data['company_mobile'] = $company_mobile; // here get variable to new data
	$data_old['company_mobile'] = $companies->company_mobile; // here get variable to old data
	// echo "<per>";
	// print_r($data);

	if ($data['company_name'] != $data_old['company_name'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'company_name' => 'required|unique:companies',
		            ]);
		if ($validator->fails()) {
		        return redirect('Add_Company')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

	if ($data['company_mail'] != $data_old['company_mail'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'company_mail' => 'required|unique:companies',
		            ]);
		if ($validator->fails()) {
		        return redirect('Add_Company')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

	if ($data['company_mobile'] != $data_old['company_mobile'] ) { // Data check here same or not
		$validator = Validator::make($request->all(), [
		            'company_mobile' => 'required|unique:companies',
		            ]);
		if ($validator->fails()) {
		        return redirect('Add_Company')
		                ->withErrors($validator)
		                ->withInput();
		    }
		
	} // Data not same condition

	//Update data query here

	$branch_update = DB::table('Companies')
			 			->where('company_id', $company_edit_id)
				        ->update([
		            	'company_name' => $company_name,
		            	'company_mail' => $company_email,
		            	'company_mobile' => $company_mobile,
		            	'company_address' => $company_address,
		            	'company_updated' => $created_at,
		            	]);
	if ($branch_update == TRUE) {
		return Redirect::back()->with('message','Company Data Updated Successful !');
	}else{
		return Redirect::back()->with('message','Company Data Do Not Updated Successful !');

	}

	} //update

}

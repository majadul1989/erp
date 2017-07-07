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
}

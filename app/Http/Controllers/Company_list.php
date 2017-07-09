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
}

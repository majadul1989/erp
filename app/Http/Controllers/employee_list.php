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

} //employee_list

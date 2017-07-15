<?php

namespace App\Http\Controllers;
use App\purchase;
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

class Purchase_list extends Controller
{

// public	function __construct()
// 	{

// 	}

public function index(){
	$purchase = new purchase();
	$purchase_list = $purchase->purchases_history();
	$select = $purchase->purchases_select();
 	return view('admin.purchase_history', [
 		'purchase_list' => $purchase_list, 
 		'select' => $select, 

 		 ]);

} //Index

//Live search functions here
public function purchaseSearch(Request $Request){
	$purchase = new purchase();
	$select = $purchase->purchases_select();
	$search_id = $Request->company_ps_id;
	$from_date = $Request->date;
	$to_date = $Request->date2;
	$purchase_search = DB::table('purchases')
					->where('company_ps_id', $search_id)
	  				->whereBetween('product_date', [$from_date, $to_date])
	  				->join('companies', 'companies.company_id', '=', 'purchases.company_ps_id')
	  				->join('users', 'users.id', '=', 'purchases.purchase_user_id')
	  				->paginate(2);
	//   				echo "<pre>";
	// print_r($purchase_list);
	// return view('admin.purchaseSearch');
	return view('admin.purchaseSearch', [
		'purchase_search' => $purchase_search,
		'select' => $select,
		]);
	  	// print_r($select);
		
	}//end of search function

} //Purchase_list
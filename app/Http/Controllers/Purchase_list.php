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
public function index(){
	$purchase = new purchase();
	$purchase_list = $purchase->purchases_history();
 	return view('admin.purchase_history', ['purchase_list' => $purchase_list]);

} //Index
} //Purchase_list

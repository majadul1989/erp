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

class Purchase extends Controller
{
public function index(){
	$companies = new company();
	$companies_list = $companies->company_lists();
	return view('admin.purchase',['companies_list' => $companies_list]);
} // Index
}

<?php

namespace App\Http\Controllers;
use App\Branches;
use Illuminate\Http\Request;

class Branch_list extends Controller
{

public function index(){
	$branch_list = branches::all();
	return view('admin.branch_list')->with('branch_list',$branch_list);
}

}

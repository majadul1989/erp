<?php

namespace App\Http\Controllers;
use App\Branches;
use App\User;
use Illuminate\Http\Request;

class Branch_list extends Controller
{

public function index(){
	$branch_list2 = new Branches();
	$branch_list = $branch_list2->branchRelation();
	
	return view('admin.branch_list')->with('branch_list',$branch_list);
}

public function edit($id){
		echo $id;
}

}

<?php

namespace App\Http\Controllers;
use App\Branches;
use App\User;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Branch_list extends Controller
{

public function index(){
	$branch_list2 = new Branches();
	$branch_list = $branch_list2->branchRelation();
	
	return view('admin.branch_list')->with('branch_list',$branch_list);
}

public function edit(Request $Request){
	$edit_id = $_GET['edit_id'];
	$branch_edit_id =  $Request->edit_id;
	$branches = DB::table('Branches')
		 			->where('branch_id', $branch_edit_id)
					->join('Users', 'users.id', '=', 'Branches.user_id')
					->first();
	return response()->json($branches);
	 $branches;
	 // if($request->ajax()){
	 //                 $id = $request->id;
	 //                 $info = Student::find($id);
	 //                 //echo json_decode($info);
	 //                 return response()->json($info);
	 //             }
	 // return Response::eloquent($branches);
	// return View('admin.branch_edit', compact('return_data'));
	
}

public function update(){
	return Redirect::back()->with('message','Operation Successful !');
}

}

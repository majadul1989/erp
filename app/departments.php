<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class departments extends Model
{

	public function department_list(){
		$departments = DB::table('departments')
	            ->paginate(4);
	    return $departments;
	}


}

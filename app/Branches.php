<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Branches extends Model
{
    protected $table = 'branches';
    protected $fillable = [
        'branch_name','branch_email','branch_phone','branch_address','branch_city','branch_description','user_id', 'create_at',
    ];

public function branchRelation(){
	$branches = DB::table('branches')
            ->join('users', 'users.id', '=', 'branches.user_id')
            ->get();
    return $branches;
}


}

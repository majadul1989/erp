<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Create_customer extends Model
{
protected $table = 'create_customers';
protected $fillable = [
    'customer_name','customer_mobile','customer_mail','customer_address','create_user_id','customer_branch_id','the_date', 'created','updated',
];

public function customer_lists(){
	$customers_list = DB::table('create_customers')
            ->join('users', 'users.id', '=', 'create_customers.create_user_id')
            ->join('branches', 'branches.branch_id', '=', 'create_customers.customer_branch_id')
            ->paginate(2);
    return $customers_list;
}

}

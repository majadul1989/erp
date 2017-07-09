<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class company extends Model
{
protected $table = 'companies';
protected $fillable = [
    'company_name','company_mobile','company_mail','company_address','company_create_user_id','company_date', 'company_created','company_updated',
];

public function company_lists(){
	$customers_list = DB::table('companies')
            ->join('users', 'users.id', '=', 'companies.create_user_id')
            ->paginate(2);
    return $customers_list;
}
}

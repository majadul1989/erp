<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
	protected $table = 'purchases';
	protected $fillable = [
	    'company_ps_id','product_brand','product_name','product_code','product_type','per_field', 'product_quantity','product_p_price','product_sale_price','purchase_user_id','product_date','product_created','product_updated',
	];

	public function purchases_history(){
		$purchase_list = DB::table('purchases')
	            ->join('users', 'users.id', '=', 'purchases.purchase_user_id')
	            ->join('companies', 'companies.company_id', '=', 'purchases.company_ps_id')
	            ->paginate(2);
	    return $purchase_list;
	}

}

<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password', 'address', 'branch_id', 'pursech', 'sales', 'return', 'sales_history', 'accounts', 'employee', 'all_branch', 'created_at',
    ];


  public function show_user(){
    $show_users = DB::table('users')
               ->join('branches', 'branches.branch_id', '=', 'users.branch_city_id')
               ->paginate(15);
       return $show_users;
   }

   public function show_user_for_edit(){
     $show_users_for_edit = DB::table('branches')
                ->get();
        return $show_users_for_edit;
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

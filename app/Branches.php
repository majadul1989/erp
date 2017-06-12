<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $table = 'branches';
    protected $fillable = [
        'abranch_name','branch_email','branch_phone','branch_address','branch_city','branch_description','user_id', 'create_at',
    ];




}

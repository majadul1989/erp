<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Sale extends Controller
{

public function index(){
	return view('admin.sale');
}

}

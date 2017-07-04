<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Branches;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

// Show user data from Database 
    public function showregistrationform()
    {
        $dates = Branches::all();
        return view('auth.register',['dates' => $dates ]);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
  


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
   

public function register(Request $request){
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'address' => 'required|string|min:10',
        'branch_id' => 'required|numeric',
        'phone' => 'required|numeric|unique:users',
    ]);

    if ($validator->fails()) {
        return redirect('register')
                    ->withErrors($validator)
                    ->withInput();

    }
    $name2 = $request->input('name');
    $name = filter_var($name2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $email2 = $request->input('email');
    $email = filter_var($email2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $phone2 = $request->input('phone');
    $phone = filter_var($phone2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $password2 = $request->input('password');
    $password = filter_var($password2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $address2 = $request->input('address');
    $address = filter_var($address2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $branch_id2 = $request->input('branch_id');
    $branch_id = filter_var($branch_id2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    $pursech2 = $request->input('pursech');
    $pursech = filter_var($pursech2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    if ($pursech == "") { // here is conditions for 0 or 1;
        $pursech = 0;
    }else{
       $pursech = 1; 
    }
    $sales2 = $request->input('sales');
    $sales = filter_var($sales2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    if ($sales == "") { // here is conditions for 0 or 1;
        $sales = 0;
    }else{
       $sales = 1; 
    }
    $return2 = $request->input('return');
    $return = filter_var($return2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    if ($return == "") { // here is conditions for 0 or 1;
        $return = 0;
    }else{
       $return = 1; 
    }
    $sales_history2 = $request->input('sales_history');
    $sales_history = filter_var($sales_history2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    if ($sales_history == "") { // here is conditions for 0 or 1;
        $sales_history = 0;
    }else{
       $sales_history = 1; 
    }
    $accounts2 = $request->input('accounts');
    $accounts = filter_var($accounts2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    if ($accounts == "") { // here is conditions for 0 or 1;
        $accounts = 0;
    }else{
       $accounts = 1; 
    }
    $employee2 = $request->input('employee');
    $employee = filter_var($employee2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    if ($employee == "") { // here is conditions for 0 or 1;
        $employee = 0;
    }else{
       $employee = 1; 
    }
    $all_branch2 = $request->input('all_branch');
    $all_branch = filter_var($all_branch2, FILTER_SANITIZE_STRING); // Validation input in special charter form
    if ($all_branch == "") { // here is conditions for 0 or 1;
        $all_branch =0;
    }else{
       $all_branch = 1; 
    }
    date_default_timezone_set("Asia/Dhaka"); // Default Asian Date and Time
    $created_at = date('Y-m-d H:i:s');
    $db = DB::table('users')->insert(
        [
            'name'          => $name,
            'email'         => $email,
            'phone'         => $phone,
            'password'      => bcrypt($password),
            'address'       => $address,
            'branch_id'     => $branch_id,
            'pursech'       => $pursech,
            'sales'         => $sales,
            'return'        => $return,
            'sales_history' => $sales_history,
            'accounts'      => $accounts,
            'employee'      => $employee,
            'all_branch'    => $all_branch,
            'created_at'    => $created_at,
            'updated_at'    => $created_at,

        ]);
    if ($db == TRUE) {
        return Redirect::back()->with('message','Employee Successfuly Added !');
    }

} //register

}

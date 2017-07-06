<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('password');
            $table->string('address');
            $table->integer('branch_city_id')->unsigned();
            $table->integer('pursech');
            $table->integer('sales');
            $table->integer('return');
            $table->integer('sales_history');
            $table->integer('accounts');
            $table->integer('employee');
            $table->integer('all_branch');
            $table->rememberToken();
            $table->timestamps();
        });
// Default data
        date_default_timezone_set("Asia/Dhaka"); // Default Asian Date and Time
        $created_at = date('Y-m-d H:i:s');
        DB::table('users')->insert(
                [
                    'name'          => 'admin',
                    'email'         => 'admin@gmail.com',
                    'phone'         => '01918305499',
                    'password'      => bcrypt('123456'),
                    'address'       => 'Mirpur, Pallabi, Dhaka-1216',
                    'branch_city_id'=> 1,
                    'pursech'       => 1,
                    'sales'         => 1,
                    'return'        => 1,
                    'sales_history' => 1,
                    'accounts'      => 1,
                    'employee'      => 1,
                    'all_branch'    => 1,
                    'created_at'    => $created_at,
                    'updated_at'    => $created_at,

                ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

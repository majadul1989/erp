<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('branch_id');
            $table->string('branch_name')->unique();
            $table->string('branch_email')->unique();
            $table->string('branch_phone',15);
            $table->string('branch_address',255);
            $table->string('branch_city',100);
            $table->string('branch_description');
            $table->Integer('user_id')->unsigned();
            $table->string('branch_create_date');
            $table->string('branch_update_date');
        });
// Default 
        date_default_timezone_set("Asia/Dhaka"); // Default Asian Date and Time
        $created_at = date('Y-m-d H:i:s');
        DB::table('branches')->insert(
                [
                'branch_name' => 'Head Branch',
                'branch_email' => 'head@gmail.com',
                'branch_phone' => '01677270944',
                'branch_address' => 'Mirpur, Pallabi, Dhaka-1216',
                'branch_city' => 'Mirpur',
                'branch_description' => 'Opened at for test',
                'user_id' => 1,
                'branch_create_date' => $created_at,
                'branch_update_date' => $created_at,

                ]
            );

    }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}

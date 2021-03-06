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
            $table->string('branch_name',100)->unique();
            $table->string('branch_email',100)->unique();
            $table->string('branch_phone',15);
            $table->string('branch_address',255);
            $table->string('branch_city',100);
            $table->string('branch_description',255);
            $table->Integer('user_id')->unsigned();
            $table->Integer('employee_id')->unsigned();
            $table->timestamps('branch_create_date');
            $table->timestamps('branch_update_date');
        });
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

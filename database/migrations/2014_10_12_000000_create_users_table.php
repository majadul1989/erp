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
            $table->string('name',255)->unique();
            $table->string('email',250)->unique();
            $table->integer('phone')->unique();
            $table->string('password',250);
            $table->string('address');
            $table->integer('branch_city_id');
            $table->integer('rule_id');
            $table->integer('pursech');
            $table->integer('sales');
            $table->integer('return');
            $table->integer('sales_history');
            $table->integer('employee');
            $table->integer('all_branch');
            $table->rememberToken();
            $table->timestamps();
        });
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

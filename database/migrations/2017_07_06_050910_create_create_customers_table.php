<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_name')->unique();
            $table->integer('customer_mobile')->unique();
            $table->string('customer_mail')->unique();
            $table->string('customer_address',500);
            $table->integer('create_user_id')->unsigned();
            $table->integer('customer_branch_id')->unsigned();
            $table->string('the_date',100);
            $table->string('created',100);
            $table->string('updated',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_customers');
    }
}

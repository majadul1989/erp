<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_name')->unique();
            $table->integer('company_mobile')->unique();
            $table->string('company_mail')->unique();
            $table->string('company_address',500);
            $table->integer('company_create_user_id')->unsigned();
            $table->string('company_date',100);
            $table->string('company_created',100);
            $table->string('company_updated',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}

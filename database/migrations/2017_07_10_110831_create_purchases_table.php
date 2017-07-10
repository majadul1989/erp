<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_ps_id')->unsigned();
            $table->string('product_brand');
            $table->string('product_name');
            $table->integer('product_code');
            $table->string('product_type');
            $table->string('per_field');
            $table->integer('product_quantity');
            $table->integer('product_p_price');
            $table->integer('product_sale_price');
            $table->integer('purchase_user_id')->unsigned();
            $table->string('product_date');
            $table->string('product_created');
            $table->string('product_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
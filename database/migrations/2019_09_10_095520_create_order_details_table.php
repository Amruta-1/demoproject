<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->timestamps();
            $table->string('cart')->nullable();
            $table->string('shipping_address_id');
            $table->string('billing_address_id');
            $table->string('cart_total');
            $table->string('discount');
            $table->string('grand_total');
            $table->string('transaction_id');
            $table->string('customer_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('date');
            $table->string('hour');
            $table->string('quantity');
            $table->string('price_unit');
            $table->string('price_total');
            $table->string('departure');
            $table->string('destination');
            $table->string('city_country');
            $table->string('payment_method');
            $table->string('status');
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
        //

        Schema::dropIfExists('orders');
    }
}

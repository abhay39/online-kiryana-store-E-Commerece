<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('userEmail');
            $table->string('userFullName');
            $table->string('productID');
            $table->string('productName');
            $table->string('qty');
            $table->string('price');
            $table->string('totalPrice');
            $table->string('orderStatus');
            $table->string('address');
            $table->string('apartment');
            $table->string('number');
            $table->string('landmark');
            $table->string('paymentMethod');
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
        Schema::dropIfExists('orders');
    }
};

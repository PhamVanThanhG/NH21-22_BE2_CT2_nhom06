<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            // $table->id();
            // $table->BigInteger('state_id');
            // $table->double('temporary_price', 8, 1);
            // $table->double('total_price', 8, 1);
            // $table->BigInteger('user_id');
            // $table->string('phonenumber');
            // $table->string('address');
            // $table->timestamps();
            $table->id();
            $table->string('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('total_price');
            // $table->BigInteger('state_id');
            // $table->BigInteger('user_id');
            $table->tinyInteger('status')->default('0');
            $table->string('tracking_no');
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
        Schema::dropIfExists('order');
    }
}

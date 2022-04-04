<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('type_id');
            $table->string('descreption');
            $table->string('image');
            $table->integer('price');
            $table->string('discount')->nullable();
            $table->timestamp('create_at')->useCurrent();
            $table->boolean('feature');
            $table->integer('expire_period');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

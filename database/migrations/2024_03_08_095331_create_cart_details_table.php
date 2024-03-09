<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('sample')->nullable();
            $table->integer('quantity');
            $table->double('price', 8, 0);
            $table->double('totalPrice', 8, 0);
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
        Schema::dropIfExists('cart_details');
    }
}

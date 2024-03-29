<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->double('price', 8, 2);
            $table->double('discount', 8, 2);
            $table->string('feature_image_path')->nullable();
            $table->longText('content');
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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnImagePathImageNameSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->dropColumn('image_path');
            $table->dropColumn('image_name');
        });
    }
}

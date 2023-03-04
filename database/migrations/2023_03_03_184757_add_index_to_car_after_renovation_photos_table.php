<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToCarAfterRenovationPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_after_renovation_photos', function (Blueprint $table) {
            $table->string("row_index")->nullable();
            $table->boolean("active");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_after_renovation_photos', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarAfterRenovationPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_after_renovation_photos', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('car_card_id');
            $table->timestamps();

            $table->foreign('car_card_id')->references('id')->on('car_cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_after_renovation_photos');
    }
}

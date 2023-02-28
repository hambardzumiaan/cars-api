<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_mark_id');
            $table->unsignedBigInteger('car_model_id');
            $table->unsignedBigInteger('car_year_id');
            $table->unsignedBigInteger('car_type_id')->nullable();
            $table->string('vin')->nullable()->unique();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->boolean('show_on_page')->default(false);
            $table->string('city')->nullable();
            $table->integer('hwy')->nullable();
            $table->unsignedBigInteger('car_body_style_id')->nullable();
            $table->unsignedBigInteger('car_sticker_id')->nullable();
            $table->unsignedBigInteger('car_engine_id')->nullable();
            $table->unsignedBigInteger('car_fuel_type_id')->nullable();
            $table->unsignedBigInteger('car_drive_type_id')->nullable();
            $table->unsignedBigInteger('car_transmission_id')->nullable();
            $table->unsignedBigInteger('car_interior_color_id')->nullable();
            $table->unsignedBigInteger('car_exterior_color_id')->nullable();
            $table->unsignedBigInteger('car_seat_id')->nullable();
            $table->longText('description')->nullable();
            $table->longText('video')->nullable();
            $table->string('view_360')->nullable();
            $table->timestamps();

            $table->foreign('car_mark_id')->references('id')->on('car_marks');
            $table->foreign('car_model_id')->references('id')->on('car_models');
            $table->foreign('car_year_id')->references('id')->on('car_years');
            $table->foreign('car_type_id')->references('id')->on('car_types');
            $table->foreign('car_body_style_id')->references('id')->on('car_body_styles');
            $table->foreign('car_sticker_id')->references('id')->on('car_stickers');
            $table->foreign('car_engine_id')->references('id')->on('car_engines');
            $table->foreign('car_fuel_type_id')->references('id')->on('car_fuel_types');
            $table->foreign('car_transmission_id')->references('id')->on('car_transmissions');
            $table->foreign('car_interior_color_id')->references('id')->on('car_interior_colors');
            $table->foreign('car_exterior_color_id')->references('id')->on('car_exterior_colors');
            $table->foreign('car_seat_id')->references('id')->on('car_seats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_cards');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('rooms', function (Blueprint $table) {
        $table->bigIncrements('r_id');
        $table->string('r_name')->nullable();
        $table->string('room_number')->nullable(); // moved here

        $table->string('r_price')->nullable();
        $table->integer('max_occupancy')->default(1); // moved here

        $table->integer('r_quantity')->nullable(); 
        $table->integer('r_bookquantity')->nullable();
        $table->integer('r_additional_bed')->nullable();
        $table->string('r_description');
        $table->string('r_image')->nullable();
        $table->integer('r_status')->nullable();
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
        Schema::dropIfExists('rooms');
           Schema::table('rooms', function (Blueprint $table) {
        $table->dropColumn(['room_number', 'max_occupancy']);
    });
    }
}

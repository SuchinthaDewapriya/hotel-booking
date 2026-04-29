<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searchings', function (Blueprint $table) {
            $table->bigIncrements('search_id');
            $table->integer('search_rid');
            $table->string('search_checkindate');
            $table->string('search_checkoutdate');
            $table->integer('search_rquantity');
            $table->string('search_package');
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
        Schema::dropIfExists('searchings');
    }
}

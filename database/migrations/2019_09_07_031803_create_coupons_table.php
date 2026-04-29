<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('coupon_id');
            $table->string('coupon_type')->nullable();
            $table->string('coupon_name')->nullable();
            $table->string('coupon_description')->nullable();
            $table->integer('coupon_room')->default('0');
            $table->integer('coupon_package')->default('0');
            $table->integer('coupon_bed')->default('0');
            $table->integer('coupon_total')->default('0');
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
        Schema::dropIfExists('coupons');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuktipembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buktipembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gambar')->default('default.png');
            $table->unsignedBigInteger('order_detail_id');
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
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
        Schema::dropIfExists('buktipembayarans');
    }
}

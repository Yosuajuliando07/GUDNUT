<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kategoriproduk_id');
            $table->unsignedBigInteger('kota_id');
            $table->string('nama_produk');
            $table->string('gambar_produk')->default('default.png');
            $table->text('deskripsi_produk');
            $table->text('alamat_lngkp_produk');
            $table->bigInteger('harga');
            $table->integer('berat');
            $table->boolean('stok')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategoriproduk_id')->references('id')->on('kategoriproduks')->onDelete('cascade');
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}

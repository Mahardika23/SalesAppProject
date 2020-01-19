<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pemesanan_id');
            $table->bigInteger('barang_id');
            $table->mediumInteger('kuantitas_barang');
            $table->bigInteger('harga_barang');
            
            
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
        Schema::dropIfExists('barang_pemesanans');
    }
}

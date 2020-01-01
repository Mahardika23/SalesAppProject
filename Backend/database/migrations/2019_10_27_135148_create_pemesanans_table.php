<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('toko_id');
            $table->bigInteger('distributor_id');
            $table->bigInteger('sales_id')->nullable();

            $table->string('nama_toko');
            $table->integer('kuantitas_pesanan')->nullable();
            $table->bigInteger('total_harga');
            $table->enum('status_pemesanan',['diterima kurir','menunggu persetujuan','diantar','selesai']);
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}

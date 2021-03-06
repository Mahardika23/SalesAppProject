<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('distributor_id');
            $table->string('nama_barang');
            $table->string('kategori_id');
            $table->bigInteger('harga_barang');
            $table->bigInteger('stok_barang');
            $table->string('item_image',50)->nullable();
            $table->boolean('global')->nullable();
            $table->text('deskripsi_produk')->nullable();
            
            // $table->bigInteger('regency_id')->nullable();
            // $table->bigInteger('village_id');
                        
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
        Schema::dropIfExists('barangs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayahProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayah_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('barang_id');
            // $table->boolean('global');
            $table->bigInteger("wilayah_id")->nullable();
            
        
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wilayah_produks');
    }
}

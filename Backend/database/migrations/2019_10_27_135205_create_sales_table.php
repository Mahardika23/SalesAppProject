<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userable_id');
            $table->bigInteger('distributor_id');
            $table->string('nama_sales');
            $table->integer('no_hp'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *userable
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

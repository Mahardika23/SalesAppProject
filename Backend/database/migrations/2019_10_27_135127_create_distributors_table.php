<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('userable_id');
            $table->string('nama_distributor');
            $table->string('alamat_distributor');
            $table->string('email_distributor');
            $table->bigInteger('province_id')->nullable();
            $table->bigInteger('regency_id')->nullable();

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
        Schema::dropIfExists('distributors');
    }
}

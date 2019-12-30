<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('userable_id');
            $table->string('nama_toko');
            $table->string('nama_pemilik');
            $table->biginteger('no_telp');
            $table->string('email_pemilik')->unique();
            $table->string('alamat_toko');
            $table->bigInteger('sales_id')->nullable();
            $table->bigInteger('province_id');
            $table->bigInteger('regency_id');
            $table->bigInteger('district_id');
            $table->bigInteger('village_id');
            $table->string('profile_image',50)->nullable();
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
        Schema::dropIfExists('tokos');
    }
}

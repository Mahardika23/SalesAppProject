<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('regencies', function (Blueprint $table) {
            $table->smallIncrements('id');
            // $table->unsignedSmallInteger('provincy_id');
            // $table->foreign('provincy_id')->references('id')->on('provinces');
            $table->string('provincy_id');
            $table->string('code',4);
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regencies');
    }
}

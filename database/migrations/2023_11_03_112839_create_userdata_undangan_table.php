<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdataUndanganTable extends Migration
{
    public function up()
    {
        Schema::create('userdata_undangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->integer('total_undangan')->default(0)->nullable();
            $table->integer('undangan_dilihat')->default(0)->nullable();
            $table->integer('total_ucapan')->default(0)->nullable();
            $table->timestamps();
 
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('userdata_undangan');
    }
}

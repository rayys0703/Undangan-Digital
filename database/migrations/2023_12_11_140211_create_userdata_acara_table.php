<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('userdata_acara', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('nama_pria')->nullable();
            $table->string('bio_pria')->nullable();
            $table->string('nama_wanita')->nullable();
            $table->string('bio_wanita')->nullable();
            $table->datetime('tanggal_akad')->nullable();
            $table->datetime('tanggal_resepsi')->nullable();
            $table->string('tempat_akad')->nullable();
            $table->string('link_tempat_akad')->nullable();
            $table->string('tempat_resepsi')->nullable();
            $table->string('link_tempat_resepsi')->nullable();
            $table->string('nama_acara')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdata_acara');
    }
};
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
        Schema::create('userdata_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('template_id');
            $table->dateTime('tanggal_pemesanan');
            $table->unsignedBigInteger('jumlah_tagihan');
            $table->string('metode_pembayaran')->nullable();
            $table->enum('status', ['Belum Bayar', 'Selesai'])->default('Belum Bayar');
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('template_id')->references('id')->on('template')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdata_pembayaran');
    }
};

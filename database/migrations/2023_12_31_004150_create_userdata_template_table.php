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
        Schema::create('userdata_template', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->unsigned();
            $table->unsignedBigInteger('templates_id');
            $table->unsignedBigInteger('users_id');
            $table->string('foto_cover')->default('images/users_template/default_cover.webp');
            $table->string('foto_pria')->default('images/users_template/default_pria.webp');
            $table->string('foto_wanita')->default('images/users_template/default_wanita.webp');
            $table->string('teks_konten_1')->default('بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ');
            $table->string('teks_konten_2')->default('Assalamualaikum Warahmatullahi Wabarakatuh');
            $table->string('teks_konten_3')->default('Tanpa mengurangi rasa hormat. Kami mengundang Bapak/Ibu/Saudara/i serta kerabat sekalian untuk menghadiri acara pernikahan kami:');
            $table->string('teks_konten_4')->default('Allah Subhanahu Wa Ta`ala berfirman');
            $table->string('teks_konten_5')->default('Dan di antara tanda kebesaran-Nya ialah Dia menciptakan pasangan dari jenismu sendiri agar kamu merasa tenteram kepadanya dan Dia menjadikan di antaramu rasa kasih sayang. Sungguh demikian itu terdapat kebesaran Allah bagi kaum yang berpikir.');
            $table->string('teks_konten_6')->default('QS. Ar-Rum Ayat 21');
            $table->string('teks_konten_7')->default('Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila, Bapak / Ibu / Saudara / i. berkenan hadir untuk memberikan do`a restunya kami ucapkan terimakasih.');
            $table->string('teks_konten_8')->default('Wassalamualaikum Warahmatullahi Wabarakatuh');
            $table->string('audio')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('nonaktif');
            $table->string('link')->nullable();
            $table->timestamps();

            $table->foreign('templates_id')->references('id')->on('template')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdata_template');
    }
};
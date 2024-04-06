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
        Schema::table('userdata_tamu', function (Blueprint $table) {
            $table->unsignedBigInteger('templates_id')->after('users_id');
            $table->foreign('templates_id')->references('id')->on('userdata_template')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userdata_tamu', function (Blueprint $table) {
            //
        });
    }
};

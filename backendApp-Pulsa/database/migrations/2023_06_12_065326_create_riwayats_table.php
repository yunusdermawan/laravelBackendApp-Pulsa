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
        if(!Schema::hasTable('riwayat')) {
            Schema::create('riwayats', function (Blueprint $table) {
                $table->id_riwayat();
                $table->string('no_kartu');
                $table->string('provider');
                $table->float('nominal');
                $table->date('tanggal');
                $table->integer('id_users');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};

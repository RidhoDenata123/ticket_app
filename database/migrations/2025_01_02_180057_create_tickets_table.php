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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('kode_ticket');
            $table->string('id_user');
            $table->string('kode_tujuan');
            $table->string('kode_jadwal');
            $table->string('kode_kendaraan');
            $table->string('ticket_price');
            $table->string('cost_kendaraan');
            $table->string('total_tagihan');
            $table->dateTime('tgl_order');
            $table->dateTime('tgl_bayar');
            $table->string('status_ticket');
            $table->string('kode_verifikasi');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

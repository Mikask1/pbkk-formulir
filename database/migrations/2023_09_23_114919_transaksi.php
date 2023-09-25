<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->integer('qty');
            $table->integer('total_bayar');
            $table->unsignedDouble('diskon');
            $table->enum('metode_bayar', ['Bank', 'GoPay', 'ShopeePay', 'OVO']);
            $table->string('bukti_transaksi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};

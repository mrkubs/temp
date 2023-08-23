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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('pesanan_id');
            $table->integer('total_bayar');
            $table->integer('jumlah_bayar');
            $table->integer('kembalian')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')
                ->onDelete('no action')->onUpdate('no action');

            $table->foreign('pesanan_id')->references('id')->on('pesanan')
                ->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};

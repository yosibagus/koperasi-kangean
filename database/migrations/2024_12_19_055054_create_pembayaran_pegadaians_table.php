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
        Schema::create('pembayaran_pegadaians', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pembayaran_pegadaian')->autoIncrement();
            $table->string('token_pg', 32);
            $table->foreignId('pegadaian_id')->references('id_pegadaian')->on('pegadaians')->cascadeOnDelete();
            $table->decimal('jumlah', 19, 2);
            $table->foreignId('__teller')->constrained('users')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_pegadaians');
    }
};

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
        Schema::create('tabungans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tabungan')->autoIncrement();
            $table->string('token_tabungan', 32);
            $table->foreignId('rekening_id')->references('id_rekening')->on('rekenings')->cascadeOnDelete();
            $table->decimal('jumlah', 19, 2);
            $table->enum('jenis', ['masuk', 'keluar'])->default('masuk');
            $table->decimal('saldo', 19, 2);
            $table->foreignId('_teller')->constrained('users')->cascadeOnUpdate();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungans');
    }
};

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
        Schema::create('rekenings', function (Blueprint $table) {
            $table->unsignedBigInteger('id_rekening')->autoIncrement();
            $table->string('token_rekening', 32);
            $table->string('no_rekening', 10);
            $table->foreignId('anggota')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('nama_rekening', 100);
            $table->unsignedInteger('kategori_id');
            $table->string('alamat', 100);
            $table->string('kode_pos', 5);
            $table->string('telepon', 20);
            $table->string('ktp', 16);
            $table->string('foto_ktp', 100);
            $table->text('deskripsi')->nullable();
            $table->foreignId('teller')->constrained('users')->cascadeOnUpdate();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id_kategori')->on('kategoris')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekenings');
    }
};

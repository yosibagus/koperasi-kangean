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
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedInteger('id_profile')->autoIncrement();
            $table->string('token_profile', 32);
            $table->string('no_profile', 6);
            $table->string('logo', 100);
            $table->string('logo_text', 100);
            $table->string('nama_profile', 100);
            $table->string('alamat');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

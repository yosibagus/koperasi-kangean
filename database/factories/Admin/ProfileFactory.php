<?php

namespace Database\Factories\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token_profile' => Str::random(32), // Token acak 32 karakter
            'no_profile' => mt_rand(000000, 999999), // Kombinasi uniqid() dan angka acak 4 digit
            'logo' => fake()->imageUrl(62, 53), // Path lokal untuk logo
            'logo_text' => fake()->imageUrl(128, 60), // Path lokal untuk logo text
            'nama_profile' => fake()->company(), // Nama perusahaan
            'alamat' => fake()->address(), // Alamat acak
            'deskripsi' => fake()->sentence(3), // Kalimat deskripsi dengan panjang tetap
            'created_at' => now(), // Tanggal saat ini
        ];
    }
}

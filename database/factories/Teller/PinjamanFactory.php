<?php

namespace Database\Factories\Teller;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teller\Pinjaman>
 */
class PinjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teller = User::where('role', 'teller')->pluck('id')->toArray();
        return [
            'token_pinjaman' => Str::random(32),
            'rekening_id' => mt_rand(1,2),
            'jumlah' => 15000,
            'bunga' => 5000,
            'status' => 'pinjam',
            'deskripsi' =>fake()->sentence(10),
            '_teller' => fake()->randomElement($teller)
        ];
    }
}

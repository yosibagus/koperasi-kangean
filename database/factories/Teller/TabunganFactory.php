<?php

namespace Database\Factories\Teller;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teller\Tabungan>
 */
class TabunganFactory extends Factory
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
            'token_tabungan' => Str::random(32),
            'rekening_id' => mt_rand(1,2),
            'jumlah' => 15000,
            'jenis' => 'masuk',
            '_teller' => fake()->randomElement($teller),
            'deskripsi' => fake()->sentence(3)
        ];
    }

}

<?php

namespace Database\Factories\Teller;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teller\Rekening>
 */
class RekeningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil semua ID pengguna dengan role 'anggota' dan 'teller'
        $userIds = User::where('role', 'anggota')->pluck('id')->toArray();
        $tellerIds = User::where('role', 'teller')->pluck('id')->toArray();

        // Pastikan ada anggota dan teller yang ditemukan
        if (empty($userIds) || empty($tellerIds)) {
            throw new \Exception('No users with role "anggota" or "teller" found.');
        }

        // Ambil ID yang sudah digunakan dari session
        $usedUserIds = session('used_user_ids', []);

        // Pilih ID anggota yang belum digunakan
        do {
            $randomUserId = fake()->randomElement($userIds);
        } while (in_array($randomUserId, $usedUserIds));

        // Simpan ID yang telah digunakan ke dalam session
        $usedUserIds[] = $randomUserId;
        session(['used_user_ids' => $usedUserIds]); // Menyimpan array ID yang sudah digunakan

        $anggota = User::where('role', 'anggota')->get();
        $teller = User::where('role', 'teller')->get();
        $data = [];
        foreach ($anggota as $item) {
            if($item->profile_id == 1){
                $idAnggota = $item->id;
                foreach ($teller as $key) {
                    if($key->profile_id == 1){
                        $idTeller = $key->id;
                        $data[] = [
                            'token_rekening' => Str::random(32),
                            'no_rekening' => mt_rand(1000000000, 9999999999),
                            'anggota' => $idAnggota,
                            'nama_rekening' => fake()->name(),
                            'kategori_id' => mt_rand(1, 3),
                            'alamat' => fake()->address(),
                            'kode_pos' => fake()->postcode(),
                            'telepon' => fake()->phoneNumber(),
                            'ktp' => fake()->nik(),
                            'foto_ktp' => fake()->randomElement(['ktp.png', 'ktp.jpg']),
                            'deskripsi' => fake()->paragraph(3),
                            'teller' => $idTeller,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
        }
        return $data;
    }
}

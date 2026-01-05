<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\Kategori;
use App\Models\admin\Profile;
use App\Models\Teller\Pegadaian;
use App\Models\Teller\Pinjaman;
use App\Models\Teller\Rekening;
use App\Models\Teller\Tabungan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
Use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Profile::create([
            'token_profile' => Str::random(32), // Token acak 32 karakter
            'no_profile' => mt_rand(000000, 999999), // Kombinasi uniqid() dan angka acak 4 digit
            'logo' => 'logo_pusat.png', // Path lokal untuk logo
            'logo_text' => 'logo_text_pusat.png', // Path lokal untuk logo text
            'nama_profile' => 'kantor Pusat', // Nama perusahaan
            'alamat' => fake()->address(), // Alamat acak
            'deskripsi' => fake()->sentence(3), // Kalimat deskripsi dengan panjang tetap
            'created_at' => Carbon::create(2024, 7, 15, now()->hour, now()->minute, now()->second), // Tanggal saat ini
        ]);
        Profile::factory(2)->create();

        Kategori::create([
            'token_kategori' => Str::random(32),
            'nama_kategori' => 'Mudarabah',
            'biaya' => 0.5,
            'min_saldo' => 10000000,
            'deskripsi' => fake()->paragraph(mt_rand(2,3))
        ]);

        Kategori::create([
            'token_kategori' => Str::random(32),
            'nama_kategori' => 'Pendidikan',
            'biaya' => 0.3,
            'min_saldo' => 10000000,
            'deskripsi' => fake()->paragraph(mt_rand(2,3))
        ]);

        Kategori::create([
            'token_kategori' => Str::random(32),
            'nama_kategori' => 'Umum',
            'biaya' => 0.03,
            'min_saldo' => 20000000,
            'deskripsi' => fake()->paragraph(mt_rand(2,3))
        ]);

        User::create([
            'token_user' => Str::random(8),
            'name' => fake()->name(),
            'foto_user' => fake()->imageUrl(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'otp' => mt_rand(000000, 999999),
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
            'profile_id' => 1,
            'role' => 'admin',
            'status' => 'aktif',
        ]);
        User::factory(14)->create();

        // Rekening::factory()->create();
        // Tabungan::factory(20)->create();
        // $anggota = User::where('role', 'anggota')->get();
        // $teller = User::where('role', 'teller')->get();
        // foreach ($anggota as $item) {
        //     foreach($teller as $key){
        //         if($item->profile_id == $key->profile_id){
        //             Rekening::create([
        //                 'token_rekening' => Str::random(32),
        //                 'no_rekening' => mt_rand(1000000000, 9999999999),
        //                 'anggota' => $item->id,
        //                 'nama_rekening' => fake()->name(),
        //                 'kategori_id' => mt_rand(1, 3),
        //                 'alamat' => fake()->address(),
        //                 'kode_pos' => fake()->postcode(),
        //                 'telepon' => fake()->phoneNumber(),
        //                 'ktp' => fake()->nik(),
        //                 'foto_ktp' => fake()->randomElement(['ktp.png', 'ktp.jpg']),
        //                 'deskripsi' => fake()->paragraph(3),
        //                 'teller' => $key->id,
        //                 'created_at' => now(),
        //                 'updated_at' => now(),
        //             ]);
        //             break;
        //         }
        //     }
        // }

        // Tabungan::factory(20)->create();
        // Pinjaman::factory(4)->create();
        // Pegadaian::factory(4)->create();
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Admin\Kategori;
use App\Models\Teller\Tabungan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ProsesBagiHasilTabungan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:proses-bagi-hasil-tabungan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Proses tabungan bulanan berdasarkan kategori dan rekening';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now();

        $kategoriList = Kategori::with('rekening.tabungan')->get();

        foreach ($kategoriList as $kategori) {
            foreach ($kategori->rekening as $rekening) {
                $createdAt = Carbon::parse($rekening->created_at);

                // Cek jika sudah mencapai 1 bulan atau lebih
                if ($today->diffInMonths($createdAt) >= 1) {
                    $alreadyProcessed = Tabungan::where('rekening_id', $rekening->id_rekening)
                        ->where('jenis', 'masuk')
                        ->where('deskripsi', 'Bagi hasil bulanan')
                        ->whereMonth('created_at', $today->month)
                        ->whereYear('created_at', $today->year)
                        ->exists();

                    if (!$alreadyProcessed) {
                        // Hitung saldo (masuk - keluar) dari tabungan
                        $saldo = $rekening->tabungan->where('jenis', 'masuk')->sum('jumlah') - $rekening->tabungan->where('jenis', 'keluar')->sum('jumlah');

                        // Cek jika saldo >= min_saldo
                        if ($saldo >= $kategori->min_saldo) {
                            // Hitung tabungan baru berdasarkan biaya%
                            $tabunganBaru = $saldo * ($kategori->biaya / 100);
                            $saldo_now = $saldo + $tabunganBaru;

                            // Tambahkan ke tabungan
                            $rekening->tabungan()->create([
                                'token_tabungan' => Str::random(16),
                                'jumlah' => $tabunganBaru,
                                'saldo' => $saldo_now,
                                'jenis' => 'masuk',
                                '_teller' => 1,
                                'deskripsi' => 'Bagi hasil bulanan',
                            ]);

                            $this->info("Tabungan sebesar {$tabunganBaru} ditambahkan ke rekening  {$rekening->no_rekening}.");
                        }
                    } else {
                        $this->info("Bagi hasil untuk rekening {$rekening->no_rekening} sudah diproses bulan ini.");
                    }
                }
            }
        }

        $this->info('Proses tabungan bulanan selesai.');
    }
}

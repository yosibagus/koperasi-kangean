<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Admin\Kategori;
use App\Models\Admin\Profile;
use App\Models\Teller\Pegadaian;
use App\Models\Teller\PembayaranPegadaian;
use App\Models\Teller\PembayaranPinjaman;
use App\Models\Teller\Pinjaman;
use App\Models\Teller\Rekening;
use App\Models\Teller\Tabungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function anggota()
    {
        $rekening = Rekening::where('anggota', auth()->user()->id)
            ->with(['anggotas.profile', 'tellers.profile', 'kategori'])
            ->first();

        // dd($histories);

        if ($rekening) {
            // Debugging: Periksa apakah rekening ditemukan
            // dd($rekening);
            $histories = DB::table('tabungans')
                ->where('rekening_id', $rekening->id_rekening)
                ->select(DB::raw("'Tabungan Masuk' AS kegiatan"), 'created_at AS tanggal', 'jumlah')
                ->where('jenis', 'masuk')
                ->unionAll(
                    DB::table('tabungans')
                        ->where('rekening_id', $rekening->id_rekening)
                        ->select(DB::raw("'Tabungan Keluar' AS kegiatan"), 'created_at AS tanggal', 'jumlah')
                        ->where('jenis', 'keluar'),
                )
                ->unionAll(
                    DB::table('pinjamans')
                        ->where('rekening_id', $rekening->id_rekening)
                        ->select(DB::raw("'Pinjaman' AS kegiatan"), 'created_at AS tanggal', 'jumlah'),
                )
                ->unionAll(
                    DB::table('pegadaians')
                        ->where('rekening_id', $rekening->id_rekening)
                        ->select(DB::raw("'Pegadaian' AS kegiatan"), 'created_at AS tanggal', 'jumlah'),
                )
                ->orderBy('tanggal', 'desc')
                ->limit(5)
                ->get();

            $saldoMasuk = Tabungan::where('rekening_id', $rekening->id_rekening)
                ->where('jenis', 'masuk')
                ->sum('jumlah');

            $saldoKeluar = Tabungan::where('rekening_id', $rekening->id_rekening)
                ->where('jenis', 'keluar')
                ->sum('jumlah');

            $saldo = $saldoMasuk - $saldoKeluar;

            // Debugging: Periksa hasil query
            // dd([$saldoMasuk, $saldoKeluar, $saldo]);

            $pinjaman = Pinjaman::where('rekening_id', $rekening->id_rekening)->where('status', 'pinjam')->first();
            if($pinjaman){
                $pinjaman_terbayar = PembayaranPinjaman::where('pinjaman_id', $pinjaman->id_pinjaman)->sum('jumlah');
                $pinjaman_tagihan = $pinjaman->jumlah + $pinjaman->bunga * (\Carbon\Carbon::parse($pinjaman->created_at)->diffInMonths(now()) + 1);
            }else{
                $pinjaman_tagihan = 0;
                $pinjaman_terbayar = 0;
            }

            $pegadaian = Pegadaian::where('rekening_id', $rekening->id_rekening)->where('status', 'gadai')->first();
            if($pegadaian){
                $pegadaian_terbayar = PembayaranPegadaian::where('pegadaian_id', $pegadaian->id_pegadaian)->sum('jumlah');
                $pegadaian_tagihan = $pinjaman->jumlah + $pinjaman->bunga * (\Carbon\Carbon::parse($pinjaman->created_at)->diffInDays(now()) + 1);
            }else{
                $pegadaian_tagihan = 0;
                $pegadaian_terbayar = 0;
            }

            $data = [
                'saldo' => $saldo,
                'haveRekening' => 1,
                'rekening' => $rekening,
                'histories' => $histories,
                'pinjaman' => $pinjaman_tagihan,
                'terbayar' => $pinjaman_terbayar,
                'pegadaian' => $pegadaian_tagihan,
                'gadai' => $pegadaian_terbayar
            ];
        } else {
            $data = [
                'saldo' => 0,
                'haveRekening' => 0,
                'rekening' => $rekening,
                'histories' => null,
                'pinjaman' => '',
                'terbayar' => '',
                'pegadaian' => '',
                'gadai' => ''
            ];
        }

        return view('anggota.dashboard', $data);
    }

    public function admin()
    {
        $cabang = Profile::count();
        $rekening = Rekening::count();
        $kategori = Kategori::count();
        $user = new User();
        $teller_profile_id = auth()->user()->profile_id;

        $data = DB::select(
            "
                SELECT
                    r.no_rekening AS rekening,
                    t.created_at AS tanggal,
                    r.nama_rekening AS anggota,
                    'Tabungan' AS aktivitas,
                    t.jenis AS status
                FROM tabungans t
                JOIN rekenings r ON t.rekening_id = r.id_rekening
                JOIN users u ON t._teller = u.id
                WHERE u.profile_id = ?

                UNION ALL

                SELECT
                    r.no_rekening AS rekening,
                    p.created_at AS tanggal,
                    r.nama_rekening AS anggota,
                    'Pinjaman' AS aktivitas,
                    p.status AS status
                FROM pinjamans p
                JOIN rekenings r ON p.rekening_id = r.id_rekening
                JOIN users u ON p._teller = u.id
                WHERE u.profile_id = ?

                UNION ALL

                SELECT
                    r.no_rekening AS rekening,
                    pg.created_at AS tanggal,
                    r.nama_rekening AS anggota,
                    'Pegadaian' AS aktivitas,
                    pg.status AS status
                FROM pegadaians pg
                JOIN rekenings r ON pg.rekening_id = r.id_rekening
                JOIN users u ON pg._teller = u.id
                WHERE u.profile_id = ?
            ",
            [$teller_profile_id, $teller_profile_id, $teller_profile_id]
        );

        $data = [
            'cabang' => $cabang,
            'rekening' => $rekening,
            'kategori' => $kategori,
            'admin' => $user->where('role', 'admin')->count(),
            'operator' => $user->where('role', 'operator')->count(),
            'teller' => $user->where('role', 'teller')->count(),
            'anggota' => $user->where('role', 'anggota')->count(),
            'data' => $data
        ];
        return view('admin.dashboard', $data);
    }

    public function teller()
    {
        $teller_id = auth()->user()->id;

        $aktivitas_tabungan = Tabungan::where('_teller', $teller_id)->count() + Rekening::where('teller', $teller_id)->count();
        $aktivitas_pinjaman = Pinjaman::where('_teller', $teller_id)->count() + PembayaranPinjaman::where('__teller', $teller_id)->count();
        $aktivitas_pegadaian = Pegadaian::where('_teller', $teller_id)->count() + PembayaranPegadaian::where('__teller', $teller_id)->count();

        $data = DB::select(
            "
                SELECT
                    r.no_rekening AS rekening,
                    t.created_at AS tanggal,
                    r.nama_rekening AS anggota,
                    'Tabungan' AS aktivitas,
                    t.jenis AS status
                FROM tabungans t
                JOIN rekenings r ON t.rekening_id = r.id_rekening
                JOIN users u ON r.anggota = u.id
                WHERE t._teller = ?

                UNION ALL

                SELECT
                    r.no_rekening AS rekening,
                    p.created_at AS tanggal,
                    r.nama_rekening AS anggota,
                    'Pinjaman' AS aktivitas,
                    p.status AS status
                FROM pinjamans p
                JOIN rekenings r ON p.rekening_id = r.id_rekening
                JOIN users u ON r.anggota = u.id
                WHERE p._teller = ?

                UNION ALL

                SELECT
                    r.no_rekening AS rekening,
                    pg.created_at AS tanggal,
                    r.nama_rekening AS anggota,
                    'Pegadaian' AS aktivitas,
                    pg.status AS status
                FROM pegadaians pg
                JOIN rekenings r ON pg.rekening_id = r.id_rekening
                JOIN users u ON r.anggota = u.id
                WHERE pg._teller = ?
            ",
            [$teller_id, $teller_id, $teller_id],
        );

        $data = [
            'tabungan' => $aktivitas_tabungan,
            'pinjaman' => $aktivitas_pinjaman,
            'pegadaian' => $aktivitas_pegadaian,
            'data' => $data
        ];
        return view('teller.dashboard', $data);
    }

    public function settings()
    {
        return view('admin.akun-profile');
    }

    public function settings_update(SettingsRequest $request)
    {
        $username = $request->name;
        $email = $request->email;

        $id = auth()->user()->id;

        User::where('id', $id)->update([
            'name' => $username,
            'email' => $email
        ]);
        return redirect('/settings')->with('success', 'Profile Berhasil Diubah');
    }
}

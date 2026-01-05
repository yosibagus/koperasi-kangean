<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use App\Models\Admin\Profile;
use App\Models\Teller\Pegadaian;
use App\Models\Teller\Pinjaman;
use App\Models\Teller\Tabungan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function tabungan(Request $request)
    {
        // Ambil filter dari request
        $tanggal = $request->input('tanggal');
        $jenis_simpanan_id = $request->input('jenis_simpanan_id');
        $cabang_id = $request->input('cabang_id');
        $jenis = $request->input('jenis'); // Tambahkan filter 'jenis'

        // Query untuk data tabungan
        $tabungan = Tabungan::with(['rekening.kategori', 'rekening.tellers.profile'])
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('created_at', $tanggal);
            })
            ->when($jenis_simpanan_id, function ($query, $jenis_simpanan_id) {
                return $query->whereHas('rekening.kategori', function ($query) use ($jenis_simpanan_id) {
                    $query->where('id_kategori', $jenis_simpanan_id);
                });
            })
            ->when($cabang_id, function ($query, $cabang_id) {
                return $query->whereHas('rekening.tellers.profile', function ($query) use ($cabang_id) {
                    $query->where('id_profile', $cabang_id);
                });
            })
            ->when($jenis, function ($query, $jenis) {
                return $query->where('jenis', $jenis); // Asumsikan ada kolom 'jenis' di tabel 'tabungan'
            })
            ->get();

        // Data untuk dropdown
        $data = [
            'jenis_simpanan' => Kategori::get(),
            'cabang' => Profile::get(),
            'tabungan' => $tabungan,
        ];

        return view('admin.laporan.tabungan', $data);
    }

    public function pinjaman(Request $request)
    {
        // Ambil filter dari request
        $tanggal = $request->input('tanggal');
        $cabang_id = $request->input('cabang_id');
        $jenis = $request->input('jenis'); // Tambahkan filter 'jenis'

        // Query untuk data pinjaman
        $pinjaman = Pinjaman::with(['rekening.kategori', 'rekening.tellers.profile'])
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('created_at', $tanggal);
            })
            ->when($cabang_id, function ($query, $cabang_id) {
                return $query->whereHas('rekening.tellers.profile', function ($query) use ($cabang_id) {
                    $query->where('id_profile', $cabang_id);
                });
            })
            ->when($jenis, function ($query, $jenis) {
                return $query->where('status', $jenis); // Asumsikan ada kolom 'jenis' di tabel 'pinjaman'
            })
            ->get();

        $data = [
            'pinjaman' => $pinjaman,
            'cabang' => Profile::get(),
        ];
        return view('admin.laporan.pinjaman', $data);
    }

    public function pegadaian(Request $request)
    {
        // Ambil filter dari request
        $tanggal = $request->input('tanggal');
        $cabang_id = $request->input('cabang_id');
        $jenis = $request->input('jenis'); // Tambahkan filter 'jenis'

        // Query untuk data pegadaian
        $pegadaian = Pegadaian::with(['rekening.kategori', 'rekening.tellers.profile'])
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('created_at', $tanggal);
            })
            ->when($cabang_id, function ($query, $cabang_id) {
                return $query->whereHas('rekening.tellers.profile', function ($query) use ($cabang_id) {
                    $query->where('id_profile', $cabang_id);
                });
            })
            ->when($jenis, function ($query, $jenis) {
                return $query->where('status', $jenis); // Asumsikan ada kolom 'jenis' di tabel 'pegadaian'
            })
            ->get();

        $data = [
            'pegadaian' => $pegadaian,
            'cabang' => Profile::get(),
        ];
        return view('admin.laporan.pegadaian', $data);
    }

    
}

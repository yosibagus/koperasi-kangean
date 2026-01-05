<?php

namespace App\Http\Controllers\Teller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teller\TabunganRequest;
use App\Models\Teller\Rekening;
use App\Models\Teller\Tabungan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungans = Tabungan::with(['rekening', 'teller'])
            ->where(function ($q) {
                $q->whereHas('rekening', function ($query) {
                    $query->whereHas('anggotas', function ($q2) {
                        $q2->where('profile_id', Session('bank'));
                    });
                })
                    ->orWhereHas('rekening', function ($query) {
                        $query->doesntHave('anggotas'); // rekening tanpa anggotas
                    });
            })
            ->orderBy('created_at', 'desc')
            ->get();


        return view('teller.tabungan.tabungan-view', compact('tabungans'));
    }

    public function store(TabunganRequest $request)
    {
        $token = Str::random(32);
        $jenis = $request->jenis;
        $jumlah = $request->jumlah;
        $deskripsi = $request->deskripsi;
        $rekening_id = Rekening::where('no_rekening', $request->rekening_id)->first()->id_rekening;

        $saldoMasuk = Tabungan::where('rekening_id', $rekening_id)
            ->where('jenis', 'masuk')
            ->sum('jumlah');
        $saldoKeluar = Tabungan::where('rekening_id', $rekening_id)
            ->where('jenis', 'keluar')
            ->sum('jumlah');
        if ($jenis == 'keluar') {
            $saldo = $saldoMasuk - $saldoKeluar;
            if ($jumlah > $saldo) {
                return redirect()->back()->with('error', 'Saldo tidak mencukupi.');
            }
            $saldo_now = $saldo - $jumlah;
        } else {
            $saldo = $saldoMasuk - $saldoKeluar;
            $saldo_now = $saldo + $jumlah;
        }

        $data = [
            'token_tabungan' => $token,
            'rekening_id' => $rekening_id,
            'jumlah' => $jumlah,
            'jenis' => $jenis,
            'saldo' => $saldo_now,
            'deskripsi' => $deskripsi,
            '_teller' => auth()->user()->id,
        ];

        // dd($data);

        Tabungan::create($data);

        return redirect()->route('tabungan.show', $token)->with('success', 'Tabungan berhasil ditambahkan.');
    }

    public function show(Tabungan $tabungan)
    {
        $saldoMasuk = Tabungan::where('rekening_id', $tabungan->rekening_id)
            ->where('jenis', 'masuk')
            ->sum('jumlah');
        $saldoKeluar = Tabungan::where('rekening_id', $tabungan->rekening_id)
            ->where('jenis', 'keluar')
            ->sum('jumlah');
        $saldo = $saldoMasuk - $saldoKeluar;
        return view('teller.tabungan.tabungan-show', compact('tabungan', 'saldo'));
    }

    public function update(TabunganRequest $request, Tabungan $tabungan)
    {
        $jenis = $request->jenis;
        $jumlah = $request->jumlah;
        $deskripsi = $request->deskripsi;
        $rekening_id = Rekening::where('no_rekening', $request->rekening_id)->first()->id_rekening;

        if ($jenis == 'keluar') {
            $saldoMasuk = Tabungan::where('rekening_id', $rekening_id)
                ->where('jenis', 'masuk')
                ->sum('jumlah');
            $saldoKeluar = Tabungan::where('rekening_id', $rekening_id)
                ->where('jenis', 'keluar')
                ->sum('jumlah');
            $saldo = $saldoMasuk - $saldoKeluar;
            if ($jumlah > $saldo) {
                return redirect()->back()->with('error', 'Saldo tidak mencukupi.');
            }
        }

        $data = [
            'rekening_id' => $rekening_id,
            'jumlah' => $jumlah,
            'jenis' => $jenis,
            'deskripsi' => $deskripsi,
            '_teller' => auth()->user()->id,
        ];

        $tabungan->update($data);

        return redirect()->route('tabungan.show', $tabungan->token_tabungan)->with('success', 'Tabungan berhasil ditambahkan.');
    }

    public function destroy(Tabungan $tabungan)
    {

        //return redirect()->back()->with('error', 'Tabungan tidak dapat dihapus.');

        $tabungan->delete();
        return redirect()->route('tabungan.index')->with('success', 'Data Berhasil di hapus');
    }

    public function cetak(Rekening $rekening)
    {
        $saldoMasuk = Tabungan::where('rekening_id', $rekening->id_rekening)
            ->where('jenis', 'masuk')
            ->sum('jumlah');
        $saldoKeluar = Tabungan::where('rekening_id', $rekening->id_rekening)
            ->where('jenis', 'keluar')
            ->sum('jumlah');
        $saldo = $saldoMasuk - $saldoKeluar;


        $tabungans = Tabungan::where('rekening_id', $rekening->id_rekening)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('teller.tabungan.tabungan-cetak', compact('tabungans', 'saldo', 'rekening'));
    }

    // public function cetakPdf(Request $request, Rekening $rekening)
    // {
    //     // === VALIDASI INPUT ===
    //     $request->validate([
    //         'rows'        => 'required|array|min:1',
    //         'rowPosition' => 'required|integer|min:1',
    //         'sandi'       => 'required'
    //     ]);


    //     // === HITUNG SALDO (tetap seperti versi lama) ===
    //     $saldoMasuk = Tabungan::where('rekening_id', $rekening->id_rekening)
    //         ->where('jenis', 'masuk')
    //         ->sum('jumlah');

    //     $saldoKeluar = Tabungan::where('rekening_id', $rekening->id_rekening)
    //         ->where('jenis', 'keluar')
    //         ->sum('jumlah');

    //     $saldo = $saldoMasuk - $saldoKeluar;

    //     $tabungans = Tabungan::where('rekening_id', $rekening->id_rekening)
    //         ->whereIn('id_tabungan', $request->rows)
    //         ->orderBy('created_at', 'asc')
    //         ->get();

    //     if ($tabungans->isEmpty()) {
    //         abort(404, 'Data tidak ditemukan');
    //     }


    //     // === DATA YANG AKAN DICETAK ===
    //     // $data = $tabungans[$request->rowToPrint - 1];
    //     $emptyRows = $request->rowPosition;
    //     $data = $tabungans->first();


    //     $sandi = $request->sandi;

    //     // === GENERATE PDF ===
    //     $pdf = Pdf::loadView('teller.tabungan.cetak-pdf', [
    //         'data'       => $data,
    //         'emptyRows'  => $emptyRows + 2,
    //         'saldo'      => $saldo,
    //         'rekening'   => $rekening,
    //         'rowPosition' => $request->rowPosition,
    //         'sandi' => $sandi
    //     ])->setPaper([0, 0, 396.85, 538.58], 'portrait');
    //     // 140mm x 190mm (PLQ-20 PASSBOOK)


    //     return $pdf->stream('mutasi-tabungan.pdf');
    // }

    public function cetakPdf(Request $request, Rekening $rekening)
    {
        /*
    |--------------------------------------------------------------------------
    | 1. VALIDASI INPUT
    |--------------------------------------------------------------------------
    */
        $request->validate([
            'rows'        => 'required|array|min:1',   // dari checkbox
            'rowPosition' => 'required|integer|min:1',
            'sandi'       => 'required'
        ]);

        /*
    |--------------------------------------------------------------------------
    | 2. HITUNG SALDO AKHIR (TETAP SEPERTI PUNYA KAMU)
    |--------------------------------------------------------------------------
    */
        $saldoMasuk = Tabungan::where('rekening_id', $rekening->id_rekening)
            ->where('jenis', 'masuk')
            ->sum('jumlah');

        $saldoKeluar = Tabungan::where('rekening_id', $rekening->id_rekening)
            ->where('jenis', 'keluar')
            ->sum('jumlah');

        $saldo = $saldoMasuk - $saldoKeluar;

        /*
    |--------------------------------------------------------------------------
    | 3. AMBIL DATA TABUNGAN BERDASARKAN CHECKBOX
    |--------------------------------------------------------------------------
    */
        $tabungans = Tabungan::where('rekening_id', $rekening->id_rekening)
            ->whereIn('id_tabungan', $request->rows)
            ->orderBy('created_at', 'asc')
            ->get();

        if ($tabungans->isEmpty()) {
            abort(404, 'Data tabungan tidak ditemukan');
        }

        /*
    |--------------------------------------------------------------------------
    | 4. HITUNG POSISI BARIS CETAK (PASSBOOK)
    |--------------------------------------------------------------------------
    */
        $startRow = (int) $request->rowPosition;

        $rowsToPrint = [];
        foreach ($tabungans as $index => $item) {
            $rowsToPrint[] = [
                'row'  => $startRow + $index,
                'data' => $item
            ];
        }
        $emptyRows = $request->rowPosition;

        /*
    |--------------------------------------------------------------------------
    | 5. GENERATE PDF
    |--------------------------------------------------------------------------
    */
        $pdf = Pdf::loadView('teller.tabungan.cetak-pdf', [
            'rows'      => $rowsToPrint,
            'saldo'     => $saldo,
            'rekening'  => $rekening,
            'sandi'     => $request->sandi,
            'emptyRows' => $emptyRows
        ])->setPaper([0, 0, 396.85, 538.58], 'portrait');
        // 140mm x 190mm (PLQ-20 PASSBOOK)

        return $pdf->stream('mutasi-tabungan.pdf');
    }
}

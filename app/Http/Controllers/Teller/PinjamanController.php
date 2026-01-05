<?php

namespace App\Http\Controllers\Teller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teller\PinjamanRequest;
use App\Models\Teller\PembayaranPinjaman;
use Illuminate\Support\Str;
use App\Models\Teller\Pinjaman;
use App\Models\Teller\Rekening;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index()
    {
        // $teller = auth()->user()->role;
        // if($teller == 'teller') {
        //     $pinjamans = Pinjaman::with('rekening.kategori', 'teller')->where('_teller', auth()->user()->id)->get();
        // } else {
        //     $pinjamans = Pinjaman::with('rekening.kategori', 'teller')->get();
        // }

        $pinjamans = Pinjaman::with('rekening.kategori', 'teller')
            ->whereHas('rekening', function ($query) {
                $query->whereHas('anggotas', function ($query) {
                    $query->where('profile_id', session('bank'));
                });
            })
            ->orderBy('created_at', 'desc')
        ->get();

        return view('teller.pinjaman.pinjaman-view', compact('pinjamans'));
    }

    public function store(PinjamanRequest $request)
    {
        $token = Str::random(32);
        $rekening = Rekening::where('no_rekening', $request->rekening_id)->first();
        $jumlah = $request->jumlah;
        $deskripsi = $request->deskripsi;

        $bunga = $jumlah * (1.4 / 100);

        $data_pinjaman = Pinjaman::where('rekening_id', $rekening->id_rekening)->where('status', 'pinjam')->get();
        if($data_pinjaman->count() > 0) {
            return redirect()->back()->with('error', 'Rekening sedang dalam proses pinjaman.');
        }

        $data = [
            'token_pinjaman' => $token,
            'rekening_id' => $rekening->id_rekening,
            'jumlah' => $jumlah,
            'bunga' => $bunga,
            'deskripsi' => $deskripsi,
            'status' => 'pinjam',
            '_teller' => auth()->user()->id,
        ];

        Pinjaman::create($data);

        return redirect()->route('pinjaman.show', $token)->with('success', 'Pinjaman berhasil dibuat.');
    }

    public function show(Pinjaman $pinjaman)
    {
        return view('teller.pinjaman.pinjaman-show', compact('pinjaman'));
    }

    public function update(PinjamanRequest $request, Pinjaman $pinjaman)
    {
        $rekening = Rekening::where('no_rekening', $request->rekening_id)->first();
        $jumlah = $request->jumlah;
        $deskripsi = $request->deskripsi;

        $bunga = $jumlah * (1.4 / 100);

        $data_pembayaran = PembayaranPinjaman::where('pinjaman_id', $pinjaman->id_pinjaman)->get();
        if($data_pembayaran->count() > 0) {
            return redirect()->back()->with('error', 'Pinjaman tidak dapat diubah karena sudah ada pembayaran.');
        }

        $data = [
            'rekening_id' => $rekening->id_rekening,
            'jumlah' => $jumlah,
            'bunga' => $bunga,
            'deskripsi' => $deskripsi,
            'status' => 'pinjam',
            '_teller' => auth()->user()->id,
        ];

        $pinjaman->update($data);

        return redirect()->route('pinjaman.show', $pinjaman->token_pinjaman)->with('success', 'Pinjaman berhasil dibuat.');
    }

    public function destroy(Pinjaman $pinjaman)
    {
        if($pinjaman->status == 'pinjam') {
            return redirect()->back()->with('error', 'Rekening sedang dalam proses pinjaman.');
        }
        $pinjaman->delete();
        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil dihapus.');
    }
}

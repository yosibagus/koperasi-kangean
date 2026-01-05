<?php

namespace App\Http\Controllers\Teller;

use App\Http\Controllers\Controller;
use App\Models\Teller\PembayaranPinjaman;
use App\Models\Teller\Pinjaman;
use App\Models\Teller\Rekening;
use App\Http\Requests\Teller\PembayaranPinjamanRequest as Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PembayaranPinjamanController extends Controller
{
    public function index(Pinjaman $pinjaman)
    {
        $pembayaran = PembayaranPinjaman::where('pinjaman_id', $pinjaman->id_pinjaman);
        $pembayaranPinjamans = $pembayaran->get();
        $terbayar = $pembayaran->sum('jumlah');
        return view('teller.pinjaman.pembayaran.pembayaran-pinjaman', compact('pembayaranPinjamans', 'pinjaman', 'terbayar'));
    }

    public function store(Request $request, Pinjaman $pinjaman)
    {
        $token = Str::random(32);
        $jumlah = $request->jumlah;

        $data = [
            'token_pp' => $token,
            'pinjaman_id' => $pinjaman->id_pinjaman,
            'jumlah' => $jumlah,
            '__teller' => auth()->user()->id
        ];
        $pembayaran = PembayaranPinjaman::where('pinjaman_id', $pinjaman->id_pinjaman);
        $jumlah_bayar = $pembayaran->sum('jumlah');
        $jumlah_tagihan = $pinjaman->jumlah +($pinjaman->bunga * (Carbon::parse($pinjaman->created_at)->diffInMonths(now()) + 1));

        if($jumlah_tagihan - $jumlah_bayar < $jumlah){
            return redirect()->back()->with('error', 'Jumlah pembayaran melebihi tagihan');
        }

        PembayaranPinjaman::create($data);

        if($jumlah_tagihan - $jumlah_bayar == 0){
            $pinjaman->update(['status' => 'lunas']);
        }

        return redirect()->route('pembayaran-pinjaman.show', $token)->with('success', 'Pembayaran Berhasil');
    }

    public function show(PembayaranPinjaman $pembayaran)
    {
        return view('teller.pinjaman.pembayaran.faktur-pembayaran-pinjaman', compact('pembayaran'));
    }

    public function update(Request $request, PembayaranPinjaman $pembayaran)
    {
        $jumlah = $request->jumlah;
        $data = [
            'jumlah' => $jumlah,
            '__teller' => auth()->user()->id
        ];
        $pembayarans = PembayaranPinjaman::where('pinjaman_id', $pembayaran->pinjaman_id);
        $jumlah_bayar = $pembayarans->sum('jumlah');
        $pinjaman = Pinjaman::where('id_pinjaman', $pembayaran->pinjaman_id)->first();
        $jumlah_tagihan = $pinjaman->jumlah +($pinjaman->bunga * (Carbon::parse($pinjaman->created_at)->diffInMonths(now()) + 1));

        if($jumlah_tagihan - $jumlah_bayar < $jumlah){
            return redirect()->back()->with('error', 'Jumlah pembayaran melebihi tagihan');
        }

        $pembayaran->update($data);


        if($jumlah_tagihan - $jumlah_bayar == 0){
            $pinjaman->update(['status' => 'lunas']);
        }else if($jumlah_tagihan - $jumlah_bayar > 0){
            $pinjaman->update(['status' => 'pinjam']);
        }

        return redirect()->route('pembayaran-pinjaman.show', $pembayaran->token_pp)->with('success', 'Pembayaran Berhasil diedit');
    }

    public function destroy(PembayaranPinjaman $pembayaran)
    {
        $pembayaran->delete();
        Pinjaman::where('id_pinjaman', $pembayaran->pinjaman_id)->update(['status' => 'pinjam']);
        return redirect()->route('pembayaran-pinjaman.index', $pembayaran->pinjaman->token_pinjaman)->with('success', 'Pembayaran Berhasil Dihapus');
    }
}

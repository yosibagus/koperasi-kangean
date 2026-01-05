<?php

namespace App\Http\Controllers\Teller;

use App\Http\Controllers\Controller;
use App\Models\Teller\PembayaranPegadaian;
use App\Http\Requests\Teller\PembayaranPegadaianRequest as Request;
use App\Models\Teller\Pegadaian;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PembayaranPegadaianController extends Controller
{
    public function index(Pegadaian $pegadaian)
    {
        $pembayaran = PembayaranPegadaian::where('pegadaian_id', $pegadaian->id_pegadaian);
        $pembayaranPegadaians = $pembayaran->get();
        $terbayar = $pembayaran->sum('jumlah');
        return view('teller.pegadaian.pembayaran.pembayaran-pegadaian', compact('pembayaranPegadaians', 'pegadaian', 'terbayar'));
    }

    public function store(Request $request, Pegadaian $pegadaian)
    {
        $token = Str::random(32);
        $jumlah = $request->jumlah;

        $data = [
            'token_pg' => $token,
            'pegadaian_id' => $pegadaian->id_pegadaian,
            'jumlah' => $jumlah,
            '__teller' => auth()->user()->id
        ];
        $pembayaran = PembayaranPegadaian::where('pegadaian_id', $pegadaian->id_pegadaian);
        $jumlah_bayar = $pembayaran->sum('jumlah');
        $jumlah_tagihan = $pegadaian->jumlah +($pegadaian->bunga * (Carbon::parse($pegadaian->created_at)->diffInDays(now()) + 1));

        if($jumlah_tagihan - $jumlah_bayar < $jumlah){
            return redirect()->back()->with('error', 'Jumlah pembayaran melebihi tagihan');
        }

        PembayaranPegadaian::create($data);

        if($jumlah_tagihan - $jumlah_bayar == 0){
            $pegadaian->update(['status' => 'lunas']);
        }

        return redirect()->route('pembayaran-pegadaian.show', $token)->with('success', 'Pembayaran Berhasil');
    }

    public function show(PembayaranPegadaian $pembayaran)
    {
        return view('teller.pegadaian.pembayaran.faktur-pembayaran-pegadaian', compact('pembayaran'));
    }

    public function update(Request $request, PembayaranPegadaian $pembayaran)
    {
        $jumlah = $request->jumlah;
        $data = [
            'jumlah' => $jumlah,
            '__teller' => auth()->user()->id
        ];
        $pembayarans = PembayaranPegadaian::where('pegadaian_id', $pembayaran->pegadaian_id);
        $jumlah_bayar = $pembayarans->sum('jumlah');
        $pegadaian = Pegadaian::where('id_pegadaian', $pembayaran->pegadaian_id)->first();
        $jumlah_tagihan = $pegadaian->jumlah +($pegadaian->bunga * (Carbon::parse($pegadaian->created_at)->diffInDays(now()) + 1));

        if($jumlah_tagihan - $jumlah_bayar < $jumlah){
            return redirect()->back()->with('error', 'Jumlah pembayaran melebihi tagihan');
        }

        $pembayaran->update($data);

        if($jumlah_tagihan - $jumlah_bayar = 0){
            $pegadaian->update(['status' => 'lunas']);
        } else {
            $pegadaian->update(['status' => 'gadai']);
        }

        return redirect()->route('pembayaran-pegadaian.show', $pembayaran->token_pg)->with('success', 'Pembayaran Berhasil diedit');
    }

    public function destroy(PembayaranPegadaian $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran-pegadaian.index', $pembayaran->pegadaian->token_pegadaian)->with('success', 'Hapus data pembayaran pegadaian berhasil');
    }
}

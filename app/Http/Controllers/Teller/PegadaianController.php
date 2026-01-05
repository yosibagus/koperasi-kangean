<?php

namespace App\Http\Controllers\Teller;

use App\Http\Controllers\Controller;
use App\Models\Teller\Pegadaian;
use App\Http\Requests\Teller\PegadaianRequest as Request;
use App\Models\Teller\PembayaranPegadaian;
use App\Models\Teller\Rekening;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PegadaianController extends Controller
{
    public function index()
    {
        // $tller = auth()->user()->role;
        // if($tller == 'teller'){
        //     $pegadaians = Pegadaian::with(['rekening', 'teller'])->where('_teller', auth()->user()->id)->get();
        // }else{
        //     $pegadaians = Pegadaian::with(['rekening', 'teller'])->get();
        // }

        $pegadaians = Pegadaian::with(['rekening', 'teller'])
        ->whereHas('rekening', function ($query) {
            $query->whereHas('anggotas', function ($query) {
                $query->where('profile_id', session('bank'));
            });
        })
        ->get();

        return view('teller.pegadaian.pegadaian-view', compact('pegadaians'));
    }

    public function store(Request $request)
    {
        $token = Str::random(32);
        $id_rekening = Rekening::where('no_rekening', $request->rekening_id)->first()->id_rekening;
        $jumlah = $request->jumlah;
        $bunga = ($jumlah * (1.4 / 100)) / 30;
        $detail_barang = $request->detail_barang;
        $file = $request->file('gambar_barang');
        $file_name = $token.'.'.$file->getClientOriginalExtension();

        $data_pegadaian = Pegadaian::where('rekening_id', $id_rekening)->where('status', 'gadai')->get();
        if($data_pegadaian->count() > 0){
            return redirect()->back()->with('error', 'Rekening sedang dalam proses gadai');
        }

        $data = [
            'token_pegadaian' => $token,
            'rekening_id' => $id_rekening,
            'gambar_barang' => $file_name,
            'detail_barang' =>$detail_barang,
            'jumlah' => $jumlah,
            'bunga' => $bunga,
            'status' => 'gadai',
            '_teller' => auth()->user()->id
        ];

        Pegadaian::create($data);
        $file->move('images/gadai', $file_name);

        return redirect()->route('pegadaian.show', $token)->with('success', 'Pegadaian berhasil dibuat');
    }

    public function show(Pegadaian $pegadaian)
    {
        return view('teller.pegadaian.pegadaian-show', compact('pegadaian'));
    }

    public function update(Request $request, Pegadaian $pegadaian)
    {
        $token = Str::random(32);
        $id_rekening = Rekening::where('no_rekening', $request->rekening_id)->first()->id_rekening;
        $jumlah = $request->jumlah;
        $bunga = ($jumlah * (1.4 / 100)) / 30;
        $detail_barang = $request->detail_barang;

        $data_pembayaran = PembayaranPegadaian::where('pegadaian_id', $pegadaian->id_pegadaian)->get();
        if($data_pembayaran->count() > 0){
            return redirect()->back()->with('error', 'Pegadaian tidak bisa diedit karena sudah ada pembayaran');
        }

        if($request->hasFile('gambar_barang')){
            $file = $request->file('gambar_barang');
            $file_name = $token.'.'.$file->getClientOriginalExtension();
            File::delete('images/gadai/'.$pegadaian->gambar_barang);
            $file->move('images/gadai', $file_name);
        }else{
            $file_name = $pegadaian->gambar_barang;
        }

        $data = [
            'token_pegadaian' => $token,
            'rekening_id' => $id_rekening,
            'gambar_barang' => $file_name,
            'detail_barang' =>$detail_barang,
            'jumlah' => $jumlah,
            'bunga' => $bunga,
            'status' => 'gadai',
            '_teller' => auth()->user()->id
        ];

        $pegadaian->update($data);

        return redirect()->route('pegadaian.show', $token)->with('success', 'Pegadaian berhasil diedit');
    }

    public function destroy(Pegadaian $pegadaian)
    {
        if($pegadaian->status == 'gadai'){
            return redirect()->route('pegadaian.index')->with('error', 'Pegadaian tidak bisa dihapus karena masih dalam status gadai');
        }
        $pegadaian->delete();
        File::delete('images/gadai/'.$pegadaian->gamabr_barang);
        return redirect()->route('pegadaian.index')->with('success', 'Gadai Berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\Teller;

use App\Http\Controllers\Controller;
use App\Models\Teller\Rekening;
use Illuminate\Support\Str;
use App\Http\Requests\Teller\RekeningRequest;
use App\Mail\RekeningCreated;
use App\Models\Admin\Kategori;
use App\Models\Admin\Profile;
use App\Models\Teller\Pegadaian;
use App\Models\Teller\Pinjaman;
use App\Models\Teller\Tabungan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RekeningController extends Controller
{
    public function index()
    {
        // $teller = auth()->user()->role;
        // $profile_id = auth()->user()->profile_id;
        // if ($teller == 'teller') {
        //     $rekenings = Rekening::with(['anggotas.profile', 'tellers.profile'])->whereHas('tellers', function($query) use ($profile_id) {
        //         $query->where('profile_id', $profile_id);

        //     })->get();
        // } else {
        //     $rekenings = Rekening::with(['anggotas.profile', 'tellers.profile'])->get();
        // }

        $rekenings = Rekening::with(['anggotas.profile', 'tellers.profile'])
            ->where(function ($query) {
                $query->whereHas('anggotas', function ($q) {
                    $q->where('profile_id', Session::get('bank'));
                })
                    ->orDoesntHave('anggotas'); // Jika anggotas null, tetap tampil
            })
            ->get();
        // dd(Rekening::get());


        return view('teller.rekening.rekening-view', compact('rekenings'));
    }

    public function create()
    {
        $data = [
            'kategoris' => Kategori::select('token_kategori', 'nama_kategori', 'id_kategori')->get(),
        ];
        return view('teller.rekening.rekening-create', $data);
    }

    public function store(RekeningRequest $request)
    {
        $teller = auth()->user();
        $token = Str::random(8);
        $nama_rekening = $request->nama_rekening;
        $kategori_id = $request->kategori_id;
        $ktp = $request->ktp;
        $alamat = $request->alamat;
        $kode_pos = $request->kode_pos;
        $telepon = $request->telepon;
        $deskripsi = $request->deskripsi;

        $file = $request->file('foto_ktp');

        $file_name = $token . '.' . $file->getClientOriginalExtension();

        // Prefix berdasarkan created_at profile
        $no_profile = Profile::where('id_profile', Session::get('bank'))
            ->first()
            ->created_at->format('dmy');

        // Ambil rekening terakhir dengan prefix yang sama, urut angka terbesar
        $id = Auth::user()->profile_id;
        $lastRekening = Rekening::where('profile_id', $id)
            ->orderByRaw('CAST(no_rekening AS UNSIGNED) DESC')
            ->first();

        if (!$lastRekening) {
            // Tidak ada nomor sebelumnya → mulai dari 0001
            $newSerial = "0001";
        } else {
            // Ambil 4 digit terakhir dan tambahkan 1
            $lastNumber = intval(substr($lastRekening->no_rekening, -4));
            $newSerial = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        }

        // Nomor rekening final
        $no_rekening = $no_profile . $newSerial;

        $data = [
            'token_rekening' => $token,
            'no_rekening' => $no_rekening,
            'nama_rekening' => $nama_rekening,
            'anggota' => null,
            'kategori_id' => $kategori_id,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'telepon' => $telepon,
            'ktp' => $ktp,
            'foto_ktp' => $file_name,
            'deskripsi' => $deskripsi,
            'teller' => auth()->user()->id,
        ];

        Rekening::create($data);
        $file->storeAs('private/ktp', $file_name, 'local');

        return redirect()->route('rekening.index')->with('success', 'Rekening berhasil dibuat');
    }

    public function show(Rekening $rekening)
    {
        return view('teller.rekening.rekening-show', compact('rekening'));
    }

    public function edit(Rekening $rekening)
    {
        $tabungan = Tabungan::where('rekening_id', $rekening->id_rekening);
        $tabungan_masuk = $tabungan->where('jenis', 'masuk')->count('jumlah');
        $tabungan_keluar = $tabungan->where('jenis', 'keluar')->count('jumlah');
        $saldo = $tabungan_masuk - $tabungan_keluar;
        if ($saldo > 0) {
            $close = true;
        } else {
            $close = false;
        }
        $kategoris = Kategori::select('token_kategori', 'nama_kategori', 'id_kategori')->get();
        return view('teller.rekening.rekening-edit', compact('rekening', 'kategoris', 'close'));
    }

    public function update(RekeningRequest $request, Rekening $rekening)
    {
        // dd($request->all());
        $token = Str::random(8);
        $nama_rekening = $request->nama_rekening;
        $kategori_id = $request->kategori_id;
        $alamat = $request->alamat;
        $kode_pos = $request->kode_pos;
        $telepon = $request->telepon;
        $ktp = $request->ktp;
        $deskripsi = $request->deskripsi;
        if ($request->email == null) {
            $anggota = null;
        } else {
            $anggota = User::where('email', $request->email)->first()->id;
        }
        if ($request->hasFile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $file_name = $token . '.' . $file->getClientOriginalExtension();
            $file->storeAs('private/ktp', $file_name, 'local');
            if (Storage::exists('private/ktp/' . $rekening->foto_ktp)) {
                Storage::delete('private/ktp/' . $rekening->foto_ktp);
            }
        } else {
            $file_name = $rekening->foto_ktp;
        }

        $data = [
            'token_rekening' => $token,
            'nama_rekening' => $nama_rekening,
            'anggota' => $anggota,
            'kategori_id' => $kategori_id,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'telepon' => $telepon,
            'ktp' => $ktp,
            'foto_ktp' => $file_name,
            'deskripsi' => $deskripsi,
        ];

        $rekening->update($data);

        return redirect()->route('rekening.index')->with('success', 'Rekening berhasil diubah');
    }

    public function destroy(Rekening $rekening)
    {
        $tabungan = Tabungan::where('rekening_id', $rekening->id_rekening);
        $tabungan_masuk = $tabungan->where('jenis', 'masuk')->count('jumlah');
        $tabungan_keluar = $tabungan->where('jenis', 'keluar')->count('jumlah');
        $saldo = $tabungan_masuk - $tabungan_keluar;
        $pinjaman = Pinjaman::where('rekening_id', $rekening->id_rekening)->count('jumlah');
        $pegadaian = Pegadaian::where('rekening_id', $rekening->id_rekening)->count('jumlah');
        $cek = $saldo + $pinjaman + $pegadaian;
        if ($cek > 0) {
            return redirect()->route('rekening.index')->with('error', 'Rekening tidak bisa dihapus karena masih memiliki saldo atau pinjaman dan pegadaian');
        } else {
            $rekening->delete();
            if (Storage::exists('private/ktp/' . $rekening->foto_ktp)) {
                Storage::delete('private/ktp/' . $rekening->foto_ktp);
            }
            return redirect()->route('rekening.index')->with('success', 'Rekening berhasil dihapus');
        }
    }

    public function cetak(Rekening $rekening)
    {
        // return view('teller.rekening.cetak-pdf-rek', compact('rekening'));
        // // (opsional) validasi sederhana
        if (!$rekening) {
            abort(404, 'Rekening tidak ditemukan');
        }

        // Generate PDF
        $pdf = Pdf::loadView('teller.rekening.cetak-pdf-rek', [
            'rekening' => $rekening,
            'user'     => Auth::user(), // untuk petugas
        ])->setPaper([0, 0, 396.85, 822.05], 'portrait');
        // 140mm x 290mm

        return $pdf->stream('cover-buku-tabungan.pdf');
    }

    public function ktp($ktp)
    {
        return response()->file(storage_path('app/private/ktp/' . $ktp), [
            'Content-Disposition' => 'inline', // Untuk menampilkan langsung di browser
        ]);
    }

    public function rekeningAPI($rekening)
    {
        $rekening = Rekening::where('no_rekening', $rekening)
            ->whereHas('anggotas', function ($query) {
                $query->where('profile_id', Session::get('bank'));
            })
            ->first();
        $tabungan_masuk =
            Tabungan::where('rekening_id', $rekening->id_rekening ?? null)
            ->where('jenis', 'masuk')
            ->sum('jumlah') ?? 0;

        $tabungan_keluar =
            Tabungan::where('rekening_id', $rekening->id_rekening ?? null)
            ->where('jenis', 'keluar')
            ->sum('jumlah') ?? 0;

        // Hitung saldo dan pastikan bertipe float
        $saldo = floatval($tabungan_masuk) - floatval($tabungan_keluar);

        $kategori = $rekening->kategori->nama_kategori;
        if ($kategori == 'Umum') {
            $card = 'card1.png';
        } elseif ($kategori == 'Pendidikan') {
            $card = 'card2.png';
        } elseif ($kategori = 'Mudarabah') {
            $card = 'card3.png';
        }

        if ($rekening) {
            return response()->json([
                'ktp' => $rekening->ktp,
                'card' => $card,
                'kategori' => $kategori,
                'rekening' => $rekening->no_rekening,
                'tanggal' => $rekening->created_at->format('m/y'),
                'role' => 'Anggota',
                'nama' => $rekening->nama_rekening,
                'saldo' => $saldo,
            ]);
        } else {
            return response()->json(['error' => 'Rekening not found'], 404);
        }
    }
}

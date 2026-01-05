<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\KategoriRequest;
use App\Models\Teller\Rekening;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.kategori-view', compact('kategoris'));
    }

    public function store(KategoriRequest $request)
    {
        $token = Str::random(32);

        Kategori::create([
            'token_kategori' => $token,
            'nama_kategori' => $request->nama_kategori,
            'biaya' => $request->biaya,
            'min_saldo' => $request->min_saldo,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori created successfully.');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.kategori-show', compact('kategori'));
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $token = Str::random(32);

        $kategori->update([
            'token_kategori' => $token,
            'nama_kategori' => $request->nama_kategori,
            'biaya' => $request->biaya,
            'min_saldo' => $request->min_saldo,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori updated successfully.');
    }

    public function destroy(Kategori $kategori)
    {
        $rekening = Rekening::where('kategori_id', $kategori->id_kategori)->get();
        if ($rekening->count() > 0) {
            return redirect()->back()
                             ->with('error', 'Kategori cannot be deleted because it has related data.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori deleted successfully.');
    }
}

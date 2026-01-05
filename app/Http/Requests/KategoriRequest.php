<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $kategoriId = $this->route('kategori') ? $this->route('kategori')->id_kategori : null;

        return [
            'nama_kategori' => 'required|string|max:100|unique:kategoris,nama_kategori,' . $kategoriId . ',id_kategori',
            'biaya' => 'required|numeric',
            'min_saldo' => 'required|numeric',
            'deskripsi' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
            'nama_kategori.max' => 'Nama kategori maksimal 100 karakter.',
            'nama_kategori.unique' => 'Nama kategori sudah ada.',
            'biaya.required' => 'Biaya wajib diisi.',
            'biaya.numeric' => 'Biaya harus berupa angka.',
            'min_saldo.required' => 'Minimal saldo wajib diisi.',
            'min_saldo.numeric' => 'Minimal saldo harus berupa angka.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.'
        ];
    }
}

<?php

namespace App\Http\Requests\Teller;

use Illuminate\Foundation\Http\FormRequest;

class RekeningRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'nama_rekening' => 'required|string|max:100',
            'kategori_id' => 'required|exists:kategoris,id_kategori',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'telepon' => 'required',
            'deskripsi' => 'nullable|string',

            // 'token_anggota' => 'nullable|exists:users,token_user',
        ];

        if ($this->isMethod('post')) {
            $rules['foto_ktp'] = 'required|image|max:1024';
            $rules['ktp'] = 'required|string|min:16|unique:rekenings,ktp';
            $rules['email'] = 'required|email|max:255|unique:users,email';
        } elseif ($this->isMethod('put')) {
            $rules['foto_ktp'] = 'nullable|image|max:1024';
            $rules['ktp'] = 'required|string|min:16';
            $rules['email'] = 'required|email|max:255';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama_rekening.required' => 'Nama rekening wajib diisi.',
            'nama_rekening.max' => 'Nama rekening tidak boleh lebih dari 100 karakter.',
            'kategori_id.required' => 'Kategori wajib diisi.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak ada.',
            'ktp.required' => 'KTP wajib diisi.',
            'ktp.size' => 'KTP harus tepat 16 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'kode_pos.required' => 'Kode Pos wajib diisi.',
            'telepon.required' => 'Telepon wajib diisi.',
            'foto_ktp.required' => 'Foto KTP wajib diisi.',
            'foto_ktp.image' => 'Foto KTP harus berupa gambar.',
            'foto_ktp.max' => 'Foto KTP tidak boleh lebih dari 1024 kilobyte.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
            'token_anggota.exists' => 'Anggota Tidak ditemukan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
        ];
    }
}

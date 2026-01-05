<?php

namespace App\Http\Requests\Teller;

use Illuminate\Foundation\Http\FormRequest;

class TabunganRequest extends FormRequest
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
        return [
            'rekening_id' => 'required|exists:rekenings,no_rekening',
            'jumlah' => 'required|numeric|min:0',
            'jenis' => 'required|in:masuk,keluar',
            'deskripsi' => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'rekening_id.required' => 'Rekening ID wajib diisi.',
            'rekening_id.exists' => 'Rekening ID tidak valid.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah tidak boleh kurang dari 0.',
            'jenis.required' => 'Jenis transaksi wajib diisi.',
            'jenis.in' => 'Jenis transaksi tidak valid.',
            'deskripsi.string' => 'Deskripsi harus berupa string'
        ];
    }
}

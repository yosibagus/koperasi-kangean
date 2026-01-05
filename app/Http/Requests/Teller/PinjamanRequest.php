<?php

namespace App\Http\Requests\Teller;

use Illuminate\Foundation\Http\FormRequest;

class PinjamanRequest extends FormRequest
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
            'deskripsi' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'rekening_id.required' => 'Rekening ID wajib diisi.',
            'rekening_id.exists' => 'Rekening ID tidak ditemukan.',
            'jumlah.required' => 'Jumlah pinjaman wajib diisi.',
            'jumlah.numeric' => 'Jumlah pinjaman harus berupa angka.',
            'jumlah.min' => 'Jumlah pinjaman tidak boleh kurang dari 0.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
        ];
    }
}

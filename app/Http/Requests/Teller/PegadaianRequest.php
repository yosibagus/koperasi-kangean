<?php

namespace App\Http\Requests\Teller;

use Illuminate\Foundation\Http\FormRequest;

class PegadaianRequest extends FormRequest
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
            'rekening_id' => 'required|exists:rekenings,no_rekening',
            'detail_barang' => 'required|string',
            'jumlah' => 'required|numeric|min:0',
        ];

        if ($this->isMethod('post')) {
            $rules['gambar_barang'] = 'required|image|mimes:png,jpg,jpeg';
        } elseif ($this->isMethod('patch')) {
            $rules['gambar_barang'] = 'nullable|image|max:1024';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'rekening_id.required' => 'Rekening ID wajib diisi.',
            'rekening_id.exists' => 'Rekening ID tidak valid.',
            'gambar_barang.required' => 'Gambar barang wajib diisi.',
            'gambar_barang.image' => 'Gambar adalah Image',
            'gambar_barang.mimes' => 'Gambar hanya .png, .jpg, .jpeg',
            'detail_barang.required' => 'Detail barang wajib diisi.',
            'detail_barang.string' => 'Detail barang harus berupa string.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah minimal 0.',
        ];
    }
}

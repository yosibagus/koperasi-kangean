<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'nama_profile' => 'required|string|max:100',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'tanggal_berdiri' => 'required',
        ];

        if ($this->isMethod('post')) {
            $rules['logo'] = 'nullable|image|mimes:png|max:1024';
            $rules['logo_text'] = 'nullable|image|mimes:png|max:1024';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'no_profile.required' => 'Nomor profil wajib diisi.',
            'no_profile.string' => 'Nomor profil harus berupa string.',
            'no_profile.size' => 'Nomor profil harus terdiri dari 4 karakter.',
            'logo.required' => 'Logo wajib diunggah.',
            'logo.image' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Logo harus berformat .png.',
            'logo.max' => 'Ukuran logo maksimal adalah 1MB.',
            'logo_text.required' => 'Logo teks wajib diunggah.',
            'logo_text.image' => 'Logo teks harus berupa gambar.',
            'logo_text.mimes' => 'Logo teks harus berformat .png.',
            'logo_text.max' => 'Ukuran logo teks maksimal adalah 1MB.',
            'nama_profile.required' => 'Nama profil wajib diisi.',
            'nama_profile.string' => 'Nama profil harus berupa string.',
            'nama_profile.max' => 'Nama profil maksimal 100 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
            'tanggal_berdiri.required' => 'Tanggal berdiri wajib diisi.',
        ];
    }
}

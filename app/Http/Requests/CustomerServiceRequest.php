<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerServiceRequest extends FormRequest
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
        $userId = $this->route('customer_service') ? $this->route('customer_service')->id : null;
        return [
            'name' => 'required|string|max:255',
            'foto_user' => $userId ? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'role' => 'required|in:teller,admin,operator,anggota',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa string.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'foto_user.required' => 'Foto pengguna wajib diisi.',
            'foto_user.image' => 'Foto pengguna harus berupa gambar.',
            'foto_user.mimes' => 'Foto pengguna harus berformat: jpeg, png, jpg, gif.',
            'foto_user.max' => 'Foto pengguna maksimal 2MB.',
            'email.required' => 'Email wajib diisi.',
            'email.string' => 'Email harus berupa string.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'contact.required' => 'No telepon harus terisi',
            'contact.numeric' => 'No telepon harus berupa nomor',
            'role.required' => 'Peran wajib diisi.',
            'role.in' => 'Peran harus salah satu dari: teller, admin, operator, anggota.',
        ];
    }
}

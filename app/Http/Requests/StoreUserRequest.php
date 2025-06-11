<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:5',
            'email' => 'required|email:rfc,dns|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Sila masukkan nama.',
            'name.min' => 'Nama terlalu pendek, minimum 5 aksara.',
            'name.max' => 'Nama terlalu panjang, maksimum 255 aksara.',
            'name.string' => 'Pastikan nama dalam bentuk teks.',
            'email.email' => 'Pastikan alamat email adalah betul.',
            'email.required' => 'Sila masukkan alamat emel.',
            'email.unique' => 'Email ini telah didaftarkan.',
            'password.required' => 'Sila masukkan kata laluan.',
            'password.min' => 'Kata laluan mesti sekurang-kurangnya 8 aksara.',
            'password.confirmed' => 'Password tidak sepadan.',
        ];
    }
}

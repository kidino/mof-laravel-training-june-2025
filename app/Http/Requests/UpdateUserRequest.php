<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:5',
            'email' => 'required|email:rfc,dns|max:255|unique:users,email,' . $this->route('user')->id,
            'password' => 'nullable|string|min:8|confirmed',
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
            'password.confirmed' => 'Password tidak sepadan.',
        ];
    }
}

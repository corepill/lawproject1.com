<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name_surname' => 'required|string|max:100',
            'x_username' => 'nullable|string|max:50',
            'instagram_username' => 'nullable|string|max:50',
            'linkedin_username' => 'nullable|string|max:50',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name_surname.required' => 'Ad ve soyad alanı zorunludur.',
            'name_surname.max' => 'Ad ve soyad en fazla 100 karakter olabilir.',
            'x_username.max' => 'X Kullanıcı Adı en fazla 50 karakter olabilir.',
            'instagram_username.max' => 'Instagram Kullanıcı Adı en fazla 50 karakter olabilir.',
            'linkedin_username.max' => 'LinkedIn Kullanıcı Adı en fazla 50 karakter olabilir.',
            'role_id.required' => 'Rol alanı zorunludur.',
            'role_id.exists' => 'Seçilen rol geçerli değil.',
            'status.required' => 'Durum alanı zorunludur.',
            'status.boolean' => 'Durum alanı geçersiz.',
            'photo.image' => 'Yüklenen dosya bir görsel olmalıdır.',
            'photo.mimes' => 'Yalnızca jpeg, jpg ve png formatlarında görseller kabul edilmektedir.',
            'photo.max' => 'Görsel boyutu en fazla 2MB olabilir.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,jpg,png,webp',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Başlık alanı zorunlu.',
            'title.max' => 'Başlık alanı 255 karakterden uzun olamaz.',
            'content.required' => 'İçerik alanı zorunlu.',
            'image_path.mimes' => 'Görsel dosyası, jpeg, jpg, png veya webp formatında olmalıdır.',
        ];
    }
}

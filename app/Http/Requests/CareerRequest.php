<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
            'role_id' => "required",
            'start_time' => "required",
            'end_time' => "required",
            'location' => "required",
            'type' => "required",
            'content' => "required",
        ];
    }

    public function messages(): array
    {
        return [
            'role_id' => 'Rol alanı zorunludur.',
            'end_time' => 'Zaman alanı zorunludur.',
            'start_time' => 'Zaman alanı zorunludur.',
            'location' => 'Lokasyon alanı zorunludur.',
            'type' => 'Tip alanı zorunludur.',
            'content' => 'İçerik alanı zorunludur.',
        ];
    }
}

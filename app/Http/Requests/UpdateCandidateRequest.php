<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
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
            'first_name' => 'nullable|string|max:150',
            'last_name' => 'nullable|string|max:150',
            'email' => 'nullable|string|max:150|unique:users',
            'password' => 'nullable|confirmed',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:250'
        ];
    }
}

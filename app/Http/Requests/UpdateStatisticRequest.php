<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatisticRequest extends FormRequest
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
            'total_courses' => 'nullable|integer',
            'courses_completed' => 'nullable|integer',
            'exams_passed' => 'nullable|integer',
            'exams_failed' => 'nullable|integer',
            'average_progress' => 'nullable|numeric'
        ];
    }
}

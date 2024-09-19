<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatisticRequest extends FormRequest
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
            'candidate_id' => 'required|integer',
            'total_courses' => 'required|integer',
            'courses_completed' => 'required|integer',
            'exams_passed' => 'required|integer',
            'exams_failed' => 'required|integer',
            'average_progress' => 'required|numeric'
        ];
    }
}

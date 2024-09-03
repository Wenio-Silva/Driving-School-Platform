<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
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
            'trainer_id' => 'nullable|integer|exists:trainers,id',
            'vehicle_id' => 'nullable|integer|exists:vehicles,id',
            'candidate_id' => 'nullable|integer|exists:candidates,id',
            'course_id' => 'nullable|integer|exists:courses,id',
            'date' => 'nullable|date_format:Y-m-d H:i',
            'status' => 'nullable|string'
        ];
    }
}

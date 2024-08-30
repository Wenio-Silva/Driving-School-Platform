<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleUsageRequest extends FormRequest
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
            'vehicle_id' => 'nullable|integer|exists:vehicles,id',
            'lesson_id' => 'nullable|integer|exists:lessons,id',
            'usage_date' => 'nullable|date',
            'mileage_before' => 'nullable|integer',
            'mileage_after' => 'nullable|integer'
        ];
    }
}

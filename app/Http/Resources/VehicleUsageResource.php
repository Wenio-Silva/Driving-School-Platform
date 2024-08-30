<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleUsageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'vehicle_id' => $this->vehicle_id,
            'lesson_id' => $this->lesson_id,
            'usage_date' => $this->usage_date,
            'mileage_before' => $this->mileage_before,
            'mileage_after' => $this->mileage_after
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'trainer_id' => $this->trainer_id,
            'vehicle_id' => $this->vehicle_id,
            'candidate_id' => $this->candidate_id,
            'course_id' => $this->course_id,
            'date' => $this->date ? $this->date->format('d-m-Y') : null,
            'status' => $this->status
        ];
    }
}

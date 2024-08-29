<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
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
            'candidate_id' => $this->candidate_id,
            'total_courses' => $this->total_courses,
            'courses_completed' => $this->courses_completed,
            'exams_passed' => $this->exams_passed,
            'exams_failed' => $this->exams_failed,
            'average_progress' => $this->average_progress,
        ];
    }
}

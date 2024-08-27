<?php

namespace App\Models;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'total_courses',
        'courses_completed',
        'exams_passed',
        'exams_failed',
        'average_progress'
    ];

    public function candidate()
    {
        return $this->belongTo(Candidate::class);
    }
}

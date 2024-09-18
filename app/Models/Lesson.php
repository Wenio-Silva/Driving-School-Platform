<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Trainer;
use App\Models\Vehicle;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'vehicle_id',
        'candidate_id',
        'course_id',
        'date',
        'status'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

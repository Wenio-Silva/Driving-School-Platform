<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'course_id',
        'type',
        'result'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

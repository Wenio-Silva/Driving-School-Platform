<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'course_id'
    ];

    public function candidate()
    {
        return $this->belongTo(Candidate::class);
    }
    
    public function course()
    {
        return $this->belongTo(Course::class);
    }
}

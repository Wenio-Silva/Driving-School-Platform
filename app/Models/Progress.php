<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'course_id',
        'status',
        'completition_porcentage'
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

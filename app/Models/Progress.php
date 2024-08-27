<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    public function candidate()
    {
        return $this->belongTo(Candidate::class);
    }
    
    public function course()
    {
        return $this->belongTo(Course::class);
    }
}

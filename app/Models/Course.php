<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Progress;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function exams()
    {
        return $this->hasMany(Progress::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}

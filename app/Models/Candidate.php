<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Progress;
use App\Models\Statistic;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function statistics()
    {
        return $this->hasMany(Statistic::class);
    }

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

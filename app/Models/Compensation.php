<?php

namespace App\Models;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compensation extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'amount',
        'date'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}

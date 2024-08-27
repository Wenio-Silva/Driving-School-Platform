<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\VehicleUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function vehiclesUsage()
    {
        return $this->belongsTo(VehicleUsage::class);
    }
}

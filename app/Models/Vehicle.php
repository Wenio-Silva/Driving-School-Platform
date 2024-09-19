<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\VehicleUsage;
use App\Models\VehicleUsageStatistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'license_plate',
        'status',
        'mileage'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function vehicleUsages()
    {
        return $this->hasMany(VehicleUsage::class);
    }

    public function vehicleUsageStatistics()
    {
        return $this->hasOne(VehicleUsageStatistic::class);
    }
}

<?php

namespace App\Models;

use App\Models\Vehicle;
use App\Models\VehicleUsageStatistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'lesson_id',
        'usage_date',
        'mileage_before',
        'mileage_after'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

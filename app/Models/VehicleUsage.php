<?php

namespace App\Models;

use App\Models\Vehicle;
use App\Models\VehicleUsageStatistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleUsage extends Model
{
    use HasFactory;

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function vehiclesUsageStatistic()
    {
        return $this->hasMany(VehicleUsageStatistic::class);
    }
}

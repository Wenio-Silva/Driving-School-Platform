<?php

namespace App\Models;

use App\Models\VehicleUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleUsageStatistic extends Model
{
    use HasFactory;

    public function vehicleUsage()
    {
        return $this->belongsTo(VehicleUsage::class);
    }
}

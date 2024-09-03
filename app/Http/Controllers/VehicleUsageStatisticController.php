<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleUsage;
use Illuminate\Http\Request;

class VehicleUsageStatisticController extends Controller
{
    public function show(Vehicle $vehicle)
    {
        $vehicleId = $vehicle->id;
        
        
        $lastUsage = VehicleUsage::where('vehicle_id', $vehicleId)
            ->orderBy('created_at', 'desc')
            ->first();

        $totalUsages = VehicleUsage::where('vehicle_id', $vehicleId)
            ->count();

        $totalMileage = VehicleUsage::where('vehicle_id', $vehicleId)
            ->get()
            ->sum(function($usage) {
                return $usage->mileage_after - $usage->mileage_before;
            });

        $averageMileagePerUsage = $totalUsages > 0 ? $totalMileage / $totalUsages : 0;

        return response()->json([
            'mileage' => $lastUsage ? $lastUsage->mileage_after : null,
            'total_usages' => $totalUsages,
            'average_mileage_per_usage' => $averageMileagePerUsage
        ]);
    }
}

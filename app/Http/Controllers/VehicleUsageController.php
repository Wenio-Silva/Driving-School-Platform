<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleUsage;
use Illuminate\Http\Request;
use App\Http\Resources\VehicleUsageResource;
use App\Http\Requests\StoreVehicleUsageRequest;
use App\Http\Requests\UpdateVehicleUsageRequest;
use App\Http\Controllers\VehicleUsageStatisticController;

class VehicleUsageController extends Controller
{
    protected $vehicleStatisticsController;

    public function __construct(VehicleUsageStatisticController $vehicleStatisticsController)
    {
        $this->vehicleStatisticsController = $vehicleStatisticsController;
    }

    public function index()
    {
        return VehicleUsageResource::collection(VehicleUsage::all());
    }

    public function store(StoreVehicleUsageRequest $request)
    {

        $vehicle_usage = new VehicleUsage();
        $vehicle_usage->vehicle_id = $request['vehicle_id'];
        $vehicle_usage->lesson_id = $request['lesson_id'];
        $vehicle_usage->usage_date = $request['usage_date'];
        $vehicle_usage->mileage_before = $request['mileage_before'];
        $vehicle_usage->mileage_after = $request['mileage_after'];
        $vehicle_usage->save();

        return VehicleUsageResource::make($vehicle_usage);
    }

    public function show(VehicleUsage $vehicle_usage)
    {
        return VehicleUsageResource::make($vehicle_usage);
    }

    public function update(UpdateVehicleUsageRequest $request, VehicleUsage $vehicle_usage)
    {
        $vehicle_usage->update($request->validated());

        return VehicleUsageResource::make($vehicle_usage);
    }

    public function destroy(VehicleUsage $vehicle_usage)
    {
        $vehicle_usage->delete();
        
        return response()->noContent();
    }
}
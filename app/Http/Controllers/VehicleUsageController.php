<?php

namespace App\Http\Controllers;

use App\Models\VehicleUsage;
use Illuminate\Http\Request;
use App\Http\Resources\VehicleUsageResource;
use App\Http\Requests\StoreVehicleUsageRequest;
use App\Http\Requests\UpdateVehicleUsageRequest;

class VehicleUsageController extends Controller
{
    public function index()
    {
        return VehicleUsageResource::collection(VehicleUsage::all());
    }

    public function store(StoreVehicleUsageRequest $request)
    {
        $validatedData = $request->validated();

        $vehicle_usage = new VehicleUsage();
        $vehicle_usage->vehicle_id = $validatedData['vehicle_id'];
        $vehicle_usage->lesson_id = $validatedData['lesson_id'];
        $vehicle_usage->usage_date = $validatedData['usage_date'];
        $vehicle_usage->mileage_before = $validatedData['mileage_before'];
        $vehicle_usage->mileage_after = $validatedData['mileage_after'];
        $vehicle_usage->save();

        return VehicleUsageResource::make($VehicleUsage);
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
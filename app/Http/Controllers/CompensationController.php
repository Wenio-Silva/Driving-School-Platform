<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\Compensation;
use Illuminate\Http\Request;
use App\Http\Resources\CompensationResource;
use App\Http\Requests\StoreCompensationRequest;
use App\Http\Requests\UpdateCompensationRequest;

class CompensationController extends Controller
{
    public function index()
    {
        return CompensationResource::collection(Compensation::all());
    }

    public function store(StoreCompensationRequest $request, Trainer $trainer)
    {
        $compensation = Compensation::create(array_merge([
            'trainer_id' => $trainer->id
        ], $request->validated()));

        return CompensationResource::make($compensation);
    }

    public function show(Trainer $trainer)
    {
        return $trainer->compensations()->get(); //StatisticResource::make($trainer->statistics()->get());
    }

    public function update(UpdateCompensationRequest $request, Trainer $trainer)
    {
        $compensation = $trainer->compensations()->first();

        if ($compensation) {
            $compensation->update($request->validated());

            return response()->json([
                'data' => $compensation
            ]);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }

    public function destroy(Trainer $trainer)
    {
        $payment = $trainer->payments()->first();

        if ($payment) {
            $payment->delete();

            return response()->noContent();
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        
    } 
}

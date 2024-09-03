<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $validatedData = $request->validated();

        $date = Carbon::createFromFormat('Y-m-d', $request['date']);
        $formattedDate = $date->format('d/m/Y');

        $compensation = new Compensation();
        $compensation->trainer_id = $trainer->id;
        $compensation->amount = $validatedData['amount'];
        $compensation->date = $date;
        $compensation->save();

        return CompensationResource::make($compensation);
    }

    public function show(Trainer $trainer)
    {
        return $trainer->compensations()->get(); //StatisticResource::make($trainer->statistics()->get());
    }

    public function update(UpdateCompensationRequest $request, Compensation $compensation)
    {
        $compensation->update($request->validated());

        return CompensationResource::make($compensation);
    }

    public function destroy(Compensation $compensation)
    {
        $compensation->delete();

        return response()->noContent();
    } 
}

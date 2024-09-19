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

    public function store(StoreCompensationRequest $request)
    {
    
        $compensation = new Compensation();
        $compensation->trainer_id = $request['trainer_id'];
        $compensation->amount = $request['amount'];
        $compensation->date = $request['date'];
        $compensation->save();

        return CompensationResource::make($compensation);
    }

    public function show(Compensation $compensation)
    {
        return CompensationResource::make($compensation);
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

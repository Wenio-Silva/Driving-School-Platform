<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Trainer;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrainerResource;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TrainerResource::collection(Trainer::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainerRequest $request)
    {
        $trainer = Trainer::create($request->validated());

        return TrainerResource::make($trainer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        return TrainerResource::make($trainer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainerRequest $request, Trainer $trainer)
    {
        $trainer->update($request->validated());

        return TrainerResource::make($trainer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();

        return response()->noContent();
    }
}

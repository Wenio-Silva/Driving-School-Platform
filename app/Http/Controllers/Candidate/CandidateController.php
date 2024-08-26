<?php

namespace App\Http\Controllers\Candidate;

use App\Models\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidateResource;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CandidateResource::collection(Candidate::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        $data = $request->validated();
        $data['registration_date'] = now()->format('Y-m-d'); //It's not working

        $candidate = Candidate::create($data);

        return CandidateResource::make($candidate);
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        return CandidateResource::make($candidate);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->validated());

        return CandidateResource::make($candidate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidateResource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Http\Requests\StoreStatisticRequest;
use App\Http\Requests\UpdateStatisticRequest;
use App\Http\Controllers\StatisticController;

class CandidateController extends Controller
{
    protected $statisticController;

    public function __construct(StatisticController $statisticController)
    {
        $this->statisticController = $statisticController;
    }

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
        $candidate = new Candidate();
        $candidate->first_name = $request['first_name'];
        $candidate->last_name = $request['last_name'];
        $candidate->email = $request['email'];
        $candidate->password = $request['password'];
        $candidate->phone = $request['phone'];
        $candidate->address = $request['address'];
        $candidate->registration_date = $request['registration_date'];
        $candiadte->save();

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

    //Statistics Methods
    public function showStatistics(Candidate $candidate)
    {
        return $this->statisticController->show($candidate);
    }

    public function storeStatistics(StoreStatisticRequest $request, Candidate $candidate)
    {
        return $this->statisticController->store($request, $candidate);
    }

    public function updateStatistics(UpdateStatisticRequest $request, Candidate $candidate)
    {
        return $this->statisticController->update($request, $candidate);
    }

    public function destroyStatistics(Candidate $candidate)
    {
        return $this->statisticController->destroy($candidate);
    }
}

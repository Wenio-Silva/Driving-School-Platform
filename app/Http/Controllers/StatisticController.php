<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Statistic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStatisticRequest;
use App\Http\Requests\UpdateStatisticRequest;
use App\Http\Resources\StatisticResource;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StatisticResource::collection(Statistic::all());
    }

    public function store(StoreStatisticRequest $request)
    {
        $statistic = new Statistic();
        $statistic->candiate_id = $required['candiate_id'];
        $statistic->total_courses = $required['total_courses'];
        $statistic->courses_completed = $required['courses_completed'];
        $statistic->exams_passed = $required['exams_passed'];
        $statistic->exams_failed = $required['exams_failed'];
        $statistic->average_progress = $required['average_progress'];
        $statistic->save();

        return StatisticResource::make($statistic);
    }

    public function show(Candidate $candidate)
    {
        return $candidate->statistics()->get(); //StatisticResource::make($candidate->statistics()->get());
    }

    public function update(UpdateStatisticRequest $request, Candidate $candidate)
    {
        $statistic = $candidate->statistics()->first();

        if ($statistic) {
            $statistic->update($request->validated());

            return response()->json([
                'data' => $statistic
            ]);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }

    public function destroy(Candidate $candidate)
    {
        $statistic = $candidate->statistics()->first();

        if ($statistic) {
            $statistic->delete();

            return response()->noContent();
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        
    } 
}

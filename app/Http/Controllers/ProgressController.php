<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Resources\ProgressResource;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;

class ProgressController extends Controller
{
    public function index()
    {
        return ProgressResource::collection(Progress::all());
    }

    public function store(StoreProgressRequest $request)
    {

        $progress = new Progress();
        $progress->candidate_id = $request['candidate_id'];
        $progress->course_id = $request['course_id'];
        $progress->status = $request['status'];
        $progress->completition_porcentage = $request['completition_porcentage'];
        $progress->save();

        return ProgressResource::make($progress);
    }

    public function show(Progress $progress)
    {
        return ProgressResource::make($progress);
    }

    public function update(UpdateProgressRequest $request, Progress $progress)
    {
        $progress->update($request->validated());

        return ProgressResource::make($progress);
    }

    public function destroy(Progress $progress)
    {
        $progress->delete();
        
        return response()->noContent();
    }
}

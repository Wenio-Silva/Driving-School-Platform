<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Resources\EnrollmentResource;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;

class EnrollmentController extends Controller
{
    public function index()
    {
        return EnrollmentResource::collection(Enrollment::all());
    }

    public function store(StoreEnrollmentRequest $request)
    {
        $enrollment = new Enrollment();
        $enrollment->candidate_id = $request->candidate_id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();

        return EnrollmentResource::make($enrollment);
    }

    public function show(Enrollment $enrollment)
    {
        return EnrollmentResource::make($enrollment);
    }

    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->validated());

        return EnrollmentResource::make($enrollment);
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        
        return response()->noContent();
    } 
}

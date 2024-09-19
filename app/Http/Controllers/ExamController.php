<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Resources\ExamResource;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;

class ExamController extends Controller
{
    public function index()
    {
        return ExamResource::collection(Exam::all());
    }

    public function store(StoreExamRequest $request)
    {

        $exam = new Exam();
        $exam->candidate_id = $request['candidate_id'];
        $exam->course_id = $request['course_id'];
        $exam->type = $request['type'];
        $exam->result = $request['result'];
        $exam->save();

        return ExamResource::make($exam);
    }

    public function show(Exam $exam)
    {
        return ExamResource::make($exam);
    }

    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam->update($request->validated());

        return ExamResource::make($exam);
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        
        return response()->noContent();
    }
}
<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Resources\LessonResource;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;

class LessonController extends Controller
{
    public function index()
    {
        return LessonResource::collection(Lesson::all());
    }

    public function store(StoreLessonRequest $request)
    {

        $lesson = new Lesson();
        $lesson->trainer_id = $request['trainer_id'];
        $lesson->vehicle_id = $request['vehicle_id'];
        $lesson->candidate_id = $request['candidate_id'];
        $lesson->course_id = $request['course_id'];
        $lesson->date = $request['date'];
        $lesson->status = $request['status'];
        $lesson->save();

        return LessonResource::make($lesson);
    }

    public function show(Lesson $lesson)
    {
        return LessonResource::make($lesson);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->validated());

        return LessonResource::make($lesson);
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        
        return response()->noContent();
    } 
}

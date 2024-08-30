<?php

namespace App\Http\Controllers;

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
        $validated_data = $request->validated();

        $lesson = new Lesson();
        $lesson->trainer_id = $validated_data['trainer_id'];
        $lesson->vehicle_id = $validated_data['vehicle_id'];
        $lesson->candidate_id = $validated_data['candidate_id'];
        $lesson->course_id = $validated_data['course_id'];
        $lesson->status = $validated_data['status'];
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

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
        $validatedData = $request->validated();

        $date = Carbon::createFromFormat('Y-m-d H:i', $request['date']);
        $formattedDate = $date->format('d/m/Y H:i');

        $lesson = new Lesson();
        $lesson->trainer_id = $validatedData['trainer_id'];
        $lesson->vehicle_id = $validatedData['vehicle_id'];
        $lesson->candidate_id = $validatedData['candidate_id'];
        $lesson->course_id = $validatedData['course_id'];
        $lesson->date = $date;
        $lesson->status = $validatedData['status'];
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

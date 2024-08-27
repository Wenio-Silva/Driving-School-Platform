<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Trainer\TrainerController;
use App\Http\Controllers\Candidate\CandidateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/candidate', CandidateController::class);  
Route::apiResource('/trainer', TrainerController::class);  

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Trainer\TrainerController;
use App\Http\Controllers\Candidate\CandidateController;
use App\Http\Controllers\API\Auth\AdminAuthController;
use App\Http\Controllers\API\Auth\CandidateAuthController;
use App\Http\Controllers\API\Auth\TrainerAuthController;

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

Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('candidate/login', [CandidateAuthController::class, 'login']);
Route::post('trainer/login', [TrainerAuthController::class, 'login']);

//Route::post('admin/register', [AdminAuthController::class, 'register']);
//Route::post('candidate/register', [CandidateAuthController::class, 'register']);
//Route::post('trainer/register', [TrainerAuthController::class, 'register']);

// Only for ADMINS
Route::middleware(['auth:sanctum', 'type.admin'])->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
    Route::apiResource('/candidate', CandidateController::class);
  });
// Only for TRAINERS
Route::middleware(['auth:sanctum', 'type.trainer'])->group(function () {
    Route::post('/trainer/logout', [CandidateAuthController::class, 'logout']);
    Route::apiResource('/trainer', TrainerController::class);  
});
// Only for CANDIDATES
Route::middleware(['auth:sanctum', 'type.candidate'])->group(function () {
    Route::post('/candidate/logout', [TrainerAuthController::class, 'logout']);
    Route::apiResource('/candidate', CandidateController::class);
});
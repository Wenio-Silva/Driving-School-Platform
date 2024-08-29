<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CompensationController;
use App\Http\Controllers\Trainer\TrainerController;
use App\Http\Controllers\API\Auth\AdminAuthController;
use App\Http\Controllers\Candidate\CandidateController;
use App\Http\Controllers\API\Auth\TrainerAuthController;
use App\Http\Controllers\API\Auth\CandidateAuthController;

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
    Route::apiResource('/trainer', TrainerController::class);  
    Route::apiResource('/course', CourseController::class);
    Route::apiResource('/vehicle', VehicleController::class);

    Route::get('/statistic', [StatisticController::class, 'index']);
    Route::get('/statistic/{candidate}', [StatisticController::class, 'show']);
    Route::post('statistic/{candidate}', [StatisticController::class, 'store']);
    Route::patch('statistic/{candidate}', [StatisticController::class, 'update']);
    Route::delete('statistic/{candidate}', [StatisticController::class, 'destroy']);

    Route::get('/payment', [PaymentController::class, 'index']);
    Route::get('/payment/{candidate}', [PaymentController::class, 'show']);
    Route::post('payment/{candidate}', [PaymentController::class, 'store']);
    Route::patch('payment/{candidate}', [PaymentController::class, 'update']);
    Route::delete('payment/{candidate}', [PaymentController::class, 'destroy']);

    Route::apiResource('/enrollment', EnrollmentController::class);

    Route::get('/compensation', [CompensationController::class, 'index']);
    Route::get('/compensation/{trainer}', [CompensationController::class, 'show']);
    Route::post('compensation/{trainer}', [CompensationController::class, 'store']);
    Route::patch('compensation/{trainer}', [CompensationController::class, 'update']);
    Route::delete('compensation/{trainer}', [CompensationController::class, 'destroy']);
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
    Route::apiResource('/enrollment', EnrollmentController::class);
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CompensationController;
use App\Http\Controllers\VehicleUsageController;
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
    Route::apiResource('/admin/candidate', CandidateController::class);
    Route::apiResource('/trainer', TrainerController::class);  
    Route::apiResource('/course', CourseController::class);
    Route::apiResource('/vehicle', VehicleController::class);

    Route::get('/admin/candidate/statistic', [CandidateController::class, 'index']);
    Route::get('/admin/candidate/statistic/{candidate}', [CandidateController::class, 'showStatistics']);
    Route::post('/admin/candidate/statistic/{candidate}', [CandidateController::class, 'storeStatistics']);
    Route::patch('/admin/candidate/statistic/{candidate}', [CandidateController::class, 'updateStatistics']);
    Route::delete('/admin/candidate/statistic/{candidate}', [CandidateController::class, 'destroyStatistics']);

    Route::get('/payment', [PaymentController::class, 'index']);
    Route::get('/payment/{candidate}', [PaymentController::class, 'show']);
    Route::post('payment/{candidate}', [PaymentController::class, 'store']);
    Route::patch('payment/{candidate}', [PaymentController::class, 'update']);
    Route::delete('payment/{candidate}', [PaymentController::class, 'destroy']);


    Route::get('/compensation', [CompensationController::class, 'index']);
    Route::get('/compensation/{trainer}', [CompensationController::class, 'show']);
    Route::post('compensation/{trainer}', [CompensationController::class, 'store']);
    Route::patch('compensation/{compensation}', [CompensationController::class, 'update']);
    Route::delete('compensation/{compensation}', [CompensationController::class, 'destroy']);

    Route::apiResource('/admin/enrollment', EnrollmentController::class);

    Route::apiResource('/admin/exam', ExamController::class);

    Route::apiResource('/admin/progress', ProgressController::class);
    
    Route::apiResource('/admin/lesson', LessonController::class);
    
    Route::apiResource('/admin/vehicleusage', VehicleUsageController::class);
    Route::get('/admin/vehicleusage/statistics/{vehicle}', [VehicleUsageController::class, 'showStatistics']);
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
    Route::apiResource('/exam', ExamController::class);
    Route::apiResource('/progress', ProgressController::class);
    Route::apiResource('/lesson', LessonController::class);
});
<?php

use App\Http\Controllers\AreaBussesController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\QuizQuestionAnswerController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\TimeTableDataController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[UserController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function (){

    Route::get('home',[UserController::class,'Home']);

    Route::get('profile',[UserController::class,'Profile']);

    Route::get('assignment',[AssignmentController::class,'Assignment']);

    Route::post('time_table',[TimeTableDataController::class,'Time_Table']);

    Route::get('holiday',[HolidayController::class,'Holiday']);

    Route::get('time_busses',[AreaBussesController::class,'Time_Busses']);

    Route::get('fee',[FeeController::class,'Fee']);

    Route::get('quiz',[QuizzesController::class,'Quizzes']);

    Route::post('quiz_question',[QuizQuestionAnswerController::class,'QuizQuestion']);

    Route::post('student_question_answer',[\App\Http\Controllers\StudentQuizAnswerController::class,'student_question_answer']);

    Route::post('student_subject_mark',[\App\Http\Controllers\StudentMarkController::class,'student_subject_mark']);

    Route::get('student_average_mark',[\App\Http\Controllers\StudentMarkController::class,'average_mark']);
});

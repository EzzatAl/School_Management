<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\FeeController::class,'Feeview']);

Route::get('/Teacher1',function(){
    return view('profile-teacher1');
});
Route::get('/Teacher2',function(){
    return view('profile-teacher2');
});Route::get('/Teacher3',function(){
    return view('profile-teacher3');
});Route::get('/Teacher4',function(){
    return view('profile-teacher4');
});
Route::get('/login',function(){
    return view('login');
});

Route::get('/student',function(){
    return view('student.profile-student');
})->name('profile');
Route::post('validate',[LoginController::class,'login'])->name('login');


Route::post('/import-users', [UserController::class, 'importUsers'])->name('import.users');

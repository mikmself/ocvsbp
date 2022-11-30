<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserEmployeeController;
use App\Http\Controllers\UserStudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/admin/dashbaord')->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('/',[UserStudentController::class,'index'])->name('indexstudent');
        Route::get('/create',[UserStudentController::class,'create'])->name('createstudent');
        Route::post('/store',[UserStudentController::class,'store'])->name('storestudent');
        Route::get('/edit/{id}',[UserStudentController::class,'edit'])->name('editstudent');
        Route::post('/update/{id}',[UserStudentController::class,'update'])->name('updatestudent');
        Route::get('/destroy/{id}',[UserStudentController::class,'destroy'])->name('destroystudent');
    });
    Route::prefix('employee')->group(function () {
        Route::get('/',[UserEmployeeController::class,'index'])->name('indexemployee');
        Route::get('/create',[UserEmployeeController::class,'create'])->name('createemployee');
        Route::post('/store',[UserEmployeeController::class,'store'])->name('storeemployee');
        Route::get('/edit/{id}',[UserEmployeeController::class,'edit'])->name('editemployee');
        Route::post('/update/{id}',[UserEmployeeController::class,'update'])->name('updateemployee');
        Route::get('/destroy/{id}',[UserEmployeeController::class,'destroy'])->name('destroyemployee');
    });
    Route::prefix('candidate')->group(function () {
        Route::get('/',[CandidateController::class,'index'])->name('indexcandidate');
        Route::get('/create',[CandidateController::class,'create'])->name('createcandidate');
        Route::post('/store',[CandidateController::class,'store'])->name('storecandidate');
        Route::get('/edit/{id}',[CandidateController::class,'edit'])->name('editcandidate');
        Route::post('/update/{id}',[CandidateController::class,'update'])->name('updatecandidate');
        Route::get('/destroy/{id}',[CandidateController::class,'destroy'])->name('destroycandidate');
    });
    Route::prefix('session')->group(function () {
        Route::get('/',[SessionController::class,'index'])->name('indexsession');
        Route::get('/create',[SessionController::class,'create'])->name('createsession');
        Route::post('/store',[SessionController::class,'store'])->name('storesession');
        Route::get('/edit/{id}',[SessionController::class,'edit'])->name('editsession');
        Route::post('/update/{id}',[SessionController::class,'update'])->name('updatesession');
        Route::get('/destroy/{id}',[SessionController::class,'destroy'])->name('destroysession');
        Route::get('/turnon/{id}',[SessionController::class,'turnOn'])->name('turnonsession');
        Route::get('/turnoff/{id}',[SessionController::class,'turnOff'])->name('turnoffsession');
    });
});

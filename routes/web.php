<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEmployeeController;
use App\Http\Controllers\UserStudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/postlogin',[AuthController::class,'postLogin'])->name('postLogin');
Route::middleware('auth')->group(function () {
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/generatepassword',[AuthController::class,'generatePassword'])->name('generatePassword');

    Route::prefix('/admin/dashboard')->group(function () {
        Route::get('/',[HomeController::class,'index'])->name('indexdashboard');
        Route::prefix('student')->group(function () {
            Route::get('/',[UserStudentController::class,'index'])->name('indexstudent');
            Route::get('/create',[UserStudentController::class,'create'])->name('createstudent');
            Route::post('/store',[UserStudentController::class,'store'])->name('storestudent');
            Route::get('/edit/{id}',[UserStudentController::class,'edit'])->name('editstudent');
            Route::post('/update/{id}',[UserStudentController::class,'update'])->name('updatestudent');
            Route::get('/destroy/{id}',[UserStudentController::class,'destroy'])->name('destroystudent');
            Route::get('/export',[UserStudentController::class,'export'])->name('exportstudent');
            Route::post('/import',[UserStudentController::class,'import'])->name('importstudent');
            Route::get('/download',[UserStudentController::class,'download'])->name('downloadexamplefilestudent');
        });
        Route::prefix('employee')->group(function () {
            Route::get('/',[UserEmployeeController::class,'index'])->name('indexemployee');
            Route::get('/create',[UserEmployeeController::class,'create'])->name('createemployee');
            Route::post('/store',[UserEmployeeController::class,'store'])->name('storeemployee');
            Route::get('/edit/{id}',[UserEmployeeController::class,'edit'])->name('editemployee');
            Route::post('/update/{id}',[UserEmployeeController::class,'update'])->name('updateemployee');
            Route::get('/destroy/{id}',[UserEmployeeController::class,'destroy'])->name('destroyemployee');
            Route::get('/export',[UserEmployeeController::class,'export'])->name('exportemployee');
            Route::post('/import',[UserEmployeeController::class,'import'])->name('importemployee');
            Route::get('/download',[UserEmployeeController::class,'download'])->name('downloadexamplefileemployee');
        });
        Route::prefix('user')->group(function () {
            Route::get('/',[UserController::class,'index'])->name('indexuser');
            Route::get('/create',[UserController::class,'create'])->name('createuser');
            Route::post('/store',[UserController::class,'store'])->name('storeuser');
            Route::get('/edit/{id}',[UserController::class,'edit'])->name('edituser');
            Route::post('/update/{id}',[UserController::class,'update'])->name('updateuser');
            Route::get('/destroy/{id}',[UserController::class,'destroy'])->name('destroyuser');
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
});



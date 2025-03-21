<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',[UserController::class,'getUsers']);
Route::get('/add-user',[UserController::class,'addUsers']);
Route::post('/create-user',[UserController::class,'createUser']);
Route::post('api/fetch-state',[UserController::class,'fetchStates']);
Route::post('/api/fetch-cities',[UserController::class,'fetchCities']);

// add-more
Route::get('/add-more',[StudentsController::class,'index']);
Route::post('/add-more',[StudentsController::class,'store']);

Route::get('/add-more-files',[FileController::class,'addForm']); 
Route::post('/post-data',[FileController::class,'postForm']); 
Route::get('/list-files',[FileController::class,'listFiles']); 

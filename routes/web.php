<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',[UserController::class,'getUsers']);
Route::get('/add-user',[UserController::class,'addUsers']);
Route::post('/create-user',[UserController::class,'createUser']);
Route::post('api/fetch-state',[UserController::class,'fetchStates']);
Route::post('/api/fetch-cities',[UserController::class,'fetchCities']);
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\UserController;
Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);







use App\Http\Controllers\AttendanceController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('attendance', [AttendanceController::class, 'store']);
    Route::get('attendance', [AttendanceController::class, 'index']);
    Route::get('attendance/{id}', [AttendanceController::class, 'show']);
    Route::put('attendance/{id}', [AttendanceController::class, 'update']);
    Route::delete('attendance/{id}', [AttendanceController::class, 'destroy']);
});


use App\Http\Controllers\CheckinOutController;
Route::middleware('auth:sanctum')->group(function () {
    Route::post('checkin-out/capture', [CheckinOutController::class, 'captureUserData']);
    Route::get('checkin-out', [CheckinOutController::class, 'index']);
});


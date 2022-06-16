<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('index');
    Route::get('/attendance', [AttendanceController::class, 'getAttendance'])->name('attendance');
    Route::post('/attendance/start', [AttendanceController::class, 'create'])->name('attendance.start');
    Route::post('/attendance/end', [AttendanceController::class, 'update'])->name('attendance.end');
    Route::post('/rest/start', [RestController::class, 'create'])->name('rest.start');
    Route::post('/rest/end', [RestController::class, 'update'])->name('rest.end');
});

require __DIR__.'/auth.php';


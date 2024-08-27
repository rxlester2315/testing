<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsController; //add DepartmentsController
use App\Http\Controllers\MessageController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\AdminController; 

use App\Http\Controllers\ClockingController;



 
//Route::get('/', function () {
//    return view('welcome');
//});
  
// Route::get('/selector', [DepartmentsController::class, 'indexs']);
// Route::get('getEmployees/{id}', [DepartmentsController::class, 'getEmployees']);





Route::get('/adminViews',[AdminController:: class,'adminview']);

Route::get('/admin_mes',[AdminController:: class,'message']);

Route::middleware('auth')->group(function () {
    Route::get('/clockings', [ClockingController::class, 'index'])->name('user.clocking');

Route::get('/clockings', [ClockingController::class, 'index'])->name('user.clocking');
Route::post('/clockings/clock-in', [ClockingController::class, 'clockIn'])->name('clockings.clock-in');
Route::post('/clockings/clock-out', [ClockingController::class, 'clockOut'])->name('clockings.clock-out');
    
});
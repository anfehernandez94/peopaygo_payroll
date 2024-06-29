<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeTimesheetController;
use App\Http\Controllers\TimesheetController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('app');
});

Route::resource("customer", CustomerController::class);
Route::resource("employee", EmployeeController::class);
Route::resource("timesheet", TimesheetController::class);
Route::resource("payroll", EmployeeTimesheetController::class);

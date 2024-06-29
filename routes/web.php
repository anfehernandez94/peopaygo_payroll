<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\TimesheetController;
use App\Models\Payroll;
use App\Models\Timesheet;

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

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource("customer", CustomerController::class);
    Route::resource("employee", EmployeeController::class);
    Route::resource("timesheet", TimesheetController::class);
});


// Route::resource("payroll", PayrollController::class);

Route::get('customer/{id}/timesheets', [CustomerController::class, 'showTimesheets'])->name('customer.timesheets');
Route::get('customer/{id}/employees', [CustomerController::class, 'showEmployees'])->name('customer.employees');
// Route::get('timesheet/{id}/payroll', [TimesheetController::class, 'showPayroll'])->name('timesheet.payroll');




require __DIR__ . '/auth.php';

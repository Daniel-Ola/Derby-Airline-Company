<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ {
    DashboardController,
    DarkModeController,
    StaffController,
    FlightController,
    AirplaneController,
    PassengerController
};

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

Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('staffs', StaffController::class, [
        'except' => ['show', 'index']
    ]);//->name('staff');
//    Route::get('staffs/show/{staff?}', [StaffController::class, 'show'])
//        ->name('staffs.show');
    Route::get('staffs', [StaffController::class, 'index'])
        ->name('staffs.index');//->where(['search' => 'a-zA-Z']);

    Route::resource('flights', FlightController::class, [
        'except' => ['show']
    ]);//->name('staff');

    Route::get('flights/manage/{flightnum}', [FlightController::class, 'manage'])->name('flights.manage');
    Route::post('flights/manage/{flightnum}', [FlightController::class, 'do_manage'])->name('do.flights.manage');
    Route::post('flights/book-flight/{flightnum}', [FlightController::class, 'bookFlight'])->name('flights.book');

    Route::resource('airplanes', AirplaneController::class);
    Route::resource('passengers', PassengerController::class, [
        'except' => ['show']
    ]);//->name('staff');
});

require __DIR__.'/auth.php';
require __DIR__.'/copied.php';

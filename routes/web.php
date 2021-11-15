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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('staffs', StaffController::class, [
        'except' => ['show', 'index']
    ]);//->name('staff');
    Route::get('staffs/show/{staff?}', [StaffController::class, 'show'])
        ->name('staffs.show');
    Route::get('staffs/{search?}', [StaffController::class, 'index'])
        ->name('staffs.index');//->where(['search' => 'a-zA-Z']);

    Route::resource('flights', FlightController::class, [
        'except' => ['show']
    ]);//->name('staff');
    Route::resource('airplanes', AirplaneController::class, [
        'except' => ['show']
    ]);//->name('staff');
    Route::resource('passengers', PassengerController::class, [
        'except' => ['show']
    ]);//->name('staff');
});

require __DIR__.'/auth.php';
require __DIR__.'/copied.php';

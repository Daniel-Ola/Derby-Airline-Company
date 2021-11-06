<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $month = Carbon::now()->month;
        $flightThisMonth = Flight::whereMonth('created_at', '=', $month)->get();
        $activeFlights = Flight::activePassengers()->with('passengers');//->get();
        $activePassengers = Passenger::whereIn('flightnum', $activeFlights->pluck('flightnum')->toArray())->get();
        $pilots = Staff::all();
        dd($pilots);

        return view('pages.dashboard', [
            'staff_count' => Staff::count(),
            'flights' => $flightThisMonth,
            'passengers' => $activePassengers,
            'airplanes' => Airplane::take(4)->get(),
            'activeFlights' => $activeFlights->take(4)->get()
        ]);

    }
}

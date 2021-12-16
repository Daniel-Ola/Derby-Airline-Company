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
    public function welcome()
    {
        $flight = Flight::waiting()->get();
        $available_flight = array_filter($flight->toArray(), [$this, 'filterFullAirplanes']);
        return view('pages.landing', [
            'flights' => $available_flight
        ]);
    }

    public function filterFullAirplanes($item)
    {
        $passenger = Passenger::where('flightnum', $item['flightnum'])->count();
        $airplane_capacity = Airplane::find($item['airplane_id'])->capacity;
        return $airplane_capacity > $passenger;
    }

    public function index() {

        $month = Carbon::now()->month;
        $flightThisMonth = Flight::whereMonth('created_at', '=', $month)->get();
        $activeFlights = Flight::activePassengers()->with('passengers');//->get();
        $flightsInProgress = Flight::inProgress()->with('passengers');//->get();
        $activePassengers = Passenger::whereIn('flightnum', $activeFlights->pluck('flightnum')->toArray())->get();
        $passengersOnBoard = Passenger::whereIn('flightnum', $flightsInProgress->pluck('flightnum')->toArray())->paginate(10);//->get();
        $pilots = Staff::myPilots()->take(4)->get();

        return view('pages.dashboard', [
            'staff_count' => Staff::count(),
            'flights' => $flightThisMonth,
            'passengers' => $activePassengers,
            'airplanes' => Airplane::take(4)->get(),
            'activeFlights' => $activeFlights->take(4)->get(),
            'pilots' => $pilots,
            'passengersOnBoard' => $passengersOnBoard
        ]);

    }
}

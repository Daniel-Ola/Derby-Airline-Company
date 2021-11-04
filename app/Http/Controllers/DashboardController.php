<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $month = Carbon::now()->month;
        $flightThisMonth = Flight::whereMonth('created_at', '=', $month)->get();

        return view('pages/dashboard', [
            'staff_count' => Staff::count(),
            'flights' => $flightThisMonth
        ]);

    }
}

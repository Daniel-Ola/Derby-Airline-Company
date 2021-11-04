<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        return view('pages/dashboard', [
            'staffs' => Staff::all(),
            'layout' => 'side-menu'
        ]);

    }
}

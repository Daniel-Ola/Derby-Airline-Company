<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Pilot;
use App\Models\PilotRating;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application | \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Airplane::latest()->get();
        return view('pages.airplanes-index', [
            'planes' => $planes,
            'rating' => $pilotRating = PilotRating::orderBy('rating')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $new_plane = Airplane::create($data);

        if ($new_plane) {
            $new_plane->numser = $new_plane->id;
            $new_plane->save();
        }

        return back()->withMessage('Machine Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airplane  $airplane
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Airplane $airplane)
    {
        $flights = Flight::whereAirplaneId($airplane->id);
        $flightnums = $flights->pluck('flightnum')->toArray();
        $passengers = Passenger::whereIn('flightnum', $flightnums)->count();
        $pilots = Pilot::wherePilotRatingId($airplane->pilot_rating_id)->count();
        return view('pages.airplanes-show', [
            'airplane' => $airplane,
            'planes' => Airplane::latest()->get(),
            'flights' => $flights->count(),
            'passengers' => $passengers,
            'pilots' => $pilots,
            'rating' => $pilotRating = PilotRating::orderBy('rating')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function edit(Airplane $airplane)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airplane $airplane)
    {
        $airplane->update($request->except('_token'));
        return back()->withMessage('Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airplane $airplane)
    {
        $airplane->delete();
        return redirect()->route('airplanes.index');
    }
}

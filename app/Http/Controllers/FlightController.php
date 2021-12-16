<?php

namespace App\Http\Controllers;

use App\Exceptions\FlightBookingException;
use App\Models\Airplane;
use App\Models\CrewMember;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Pilot;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helper;
use App\Services\FlightService;
use Illuminate\Support\Facades\Session;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $flights = Flight::latest()->members()->paginate(12);
        return view('pages.fights-index', [
            'flights' => $flights
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Helper $helper)
    {
        $lastFlight = Flight::latest()->first()->id + 1;
        $flightnum = 'DERFLY' . $helper->formatNumber($lastFlight);
        $activeFlights = Flight::select(['airplane_id', 'pilot_id'])->where('status', '<>', 'completed');
        $activePlanes = $activeFlights->pluck('airplane_id');
        $activePilots = $activeFlights->pluck('pilot_id');
        $pilots = Staff::whereStaffRoleId(6)->whereNotIn('id', $activePlanes)->get();
//        dd($pilots);
        $availableAircraft = Airplane::whereNotIn('id',$activePlanes)->get();
        return view('pages.flights-create', [
            'roles' => [],
            'aircraft' => $availableAircraft,
            'flightnum' => $flightnum,
            'pilots' => $pilots
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request, Helper $helper)
    {
        $take_off = $helper->parseDateTime($request->takeoff);
        $eta = $helper->parseDateTime($request->eta);
        $data = array_merge(
            $request->except(['_token', 'takeoff', 'eta']),
            ['take_off_time' => $take_off], ['estimated_arrival_time' => $eta]
        );

        $flight = Flight::create($data);

        if ($flight) {
            return redirect()->route('flights.manage', [$flight->flightnum]);
        } else {
            return back();
        }

    }

    public function manage($flightnum, FlightService $flightService)
    {
        $update_status = \request()->get('update_status');
        if ($update_status)
        {
            Flight::whereFlightnum($flightnum)->update([
                'status' => $update_status
            ]);

            Session::flash('message', 'Flight status updated successful');
            return redirect()->route('flights.manage', [$flightnum]);
        }

        $flight = Flight::whereFlightnum($flightnum);
        if ( ! $flight->exists()) abort(404);

        $flight = $flight->first();

        $plane = $flight->airplane_id;
        $pilots = $flightService->getAvailableQualifiedPilot($plane);

        $crewMembers = CrewMember::whereFlightnum($flightnum);// $flightService->getActiveFlightCrewMembers($flightnum);
        $crews = CrewMember::where('flightnum', '<>', $flightnum)
            ->pluck('empnum')
            ->toArray();
        $other_staffs = Staff::whereNotIn('empnum', $crews)
            ->with('role')
            ->get();

        return view('pages.flights-manage', [
            'flight' => $flight,
            'pilots' => $pilots,
            'co_pilots' => $flightService->getAvailableCoPilot(),
            'crews' => $flightService->getAvailableCrew(),
            'crewMembers' => $crewMembers->pluck('empnum')->toArray(),
            'other_staffs' => $other_staffs,
            'has_crew_members' => $crewMembers->exists(),
            'on_board' => $flightService->checkIfSpaceStillDey($flightnum)
        ]);
    }

    public function do_manage($flightnum, Request $request, FlightService $flightService)
    {
        if (!$flightnum) return back();

        if ($request->has_crews)
            CrewMember::whereFlightnum($flightnum)->delete();

        $selected_crew_members = array_filter($request->empnum, function ($query) {
            if (! is_null($query))
                return $query;
        });

        $staffsRaw = Staff::whereIn('empnum', $selected_crew_members);
        $staffs = $staffsRaw->get(['empnum', 'staff_role_id', 'email']);
        $data = [];
        foreach ($staffs as $staff) {
            $data[] = [
                'empnum' => $staff->empnum,
                'staff_role_id' => $staff->staff_role_id,
                'flightnum' => $flightnum
            ];
        }
        $columns = ['empnum', 'staff_role_id', 'flightnum'];

        $save = CrewMember::upsert($data, $columns);

        if ($save)
        {
            try {
                $emails = array_filter($staffsRaw->pluck('email')->toArray(), function ($email) {
                    if (! is_null($email))
                        return $email;
                });
                $userData = [
                    'email' => $emails,
                    'flightnum' => $flightnum
                ];
                $flightService->sendFlightBookingMail('notify_crews', $userData);
            } catch (FlightBookingException $flightBookingException) {
                throw $flightBookingException;
            }
            return back()->withMessage('Successful');

        }
        return back()->withMessage('Request Failed!');

    }

    public function bookFlight(Request $request, FlightService $flightService)
    {
        $flightnum = $request->flightnum;
        $space_dey_plane = $flightService->checkIfSpaceStillDey($flightnum);
        if (! $space_dey_plane)
            return back()->withMessage('Flight booking could not be completed, airplane capacity reached');

        $data = $request->except('_token');
        $book = Passenger::create($data);
        if ($book)
        {
            try {
                $userData = [
                    'email' => $request->email,
                    'name' => $request->name . ' ' . $request->surname,
                    'booking_id' => $book->id
                ];
                $flightService->sendFlightBookingMail('flight_booked', $userData);
            } catch (FlightBookingException $flightBookingException)
            {
                return back()->withMessage('Flight Booked Successfully, notification email was interrupted. Please contact support');
            }
            return back()->withMessage('Flight Booked Successfully! Check your email inbox!');
        }
        return back()->withMessage('Flight Booking Failed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }
}

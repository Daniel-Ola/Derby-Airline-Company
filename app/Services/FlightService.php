<?php

namespace App\Services;



use App\Models\Airplane;
use App\Models\CrewMember;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Pilot;
use App\Models\Staff;

class FlightService
{
//    public function __construct()
//    {
//    }

    public function getAvailableQualifiedPilot($plane, $use_strict = true)
    {
        if ( ! $use_strict) $this->getAnyAvailablePilot($plane);

        $rating = Airplane::find($plane)->pilot_rating_id;
        $activeFlights = $this->getActiveFlights('flightnum');
        $activeCrews = $this->getActiveCrewMembers();
        $pilot = Pilot::where('pilot_rating_id', '=', $rating)
            ->whereNotIn('empnum', $activeCrews)
            ->with('staffs')->get();

        return $pilot;
    }

    public function getAvailableCoPilot()
    {
        $activeCrewMembers = $this->getActiveCrewMembers();
        return Staff::whereNotIn('empnum', $activeCrewMembers)
            ->whereStaffRoleId(5)
            ->get();
    }

    public function getAvailableCrew()
    {
        $activeCrewMembers = $this->getActiveCrewMembers();
        return Staff::whereNotIn('empnum', $activeCrewMembers)
            ->whereNotIn('staff_role_id', [5,6])
            ->with('role')
            ->get();
    }

    public function getAvailableStaff()
    {
        $activeCrewMembers = $this->getActiveCrewMembers();
        return Staff::whereNotIn('empnum', $activeCrewMembers);
    }

    public function getAnyAvailablePilot($plane)
    {
        return;
    }

    public function getActiveFlights($column = null, $flightnum = null)
    {
        $activeFlights = Flight::where('status', '<>', 'completed');
        if ( ! is_null($flightnum))
            $activeFlights = $activeFlights->whereFlightnum($flightnum);
        if (is_null($column) || $column == '*')
            return $activeFlights = $activeFlights->get();
        if (is_array($column))
            return $activeFlights->pluck($column);
        return $activeFlights->pluck($column);
    }

    public function getActiveCrewMembers()
    {
        $flight = $this->getActiveFlights('flightnum');
        return CrewMember::whereIn('flightnum', $flight)->pluck('empnum');
    }

    /**
     * @param null $flightnum
     * select other active crew members that are not on this flight
     * and then return all other non active members including the ones that are in the flight at the moment
     */
//    public function getActiveFlightCrewMembers($flightnum = null)
//    {
//        $crews = CrewMember::where('flightnum', '<>', $flightnum);//->get(); // these will not be included in non-active staffs
//        return Staff::whereNotIn('empnum', $crews->pluck('empnum')->toArray())->get();
//    }

    /**
     * @param $flightnum
     * @return array|false
     * checks if a flight is fully booked
     * returns false if fully booked (space no dey) and
     * returns an array if not (space still dey)
     */
    public function checkIfSpaceStillDey($flightnum)
    {
        $flight = Flight::whereFlightnum($flightnum)
            ->with('airplane')
            ->with('passengers')
            ->first() ;// Passenger::whereFlightnum()
        $airplane_capacity = $flight->airplane->capacity;
        $passengers_on_board = $flight->passengers->count();
        $rem = intval($airplane_capacity) - $passengers_on_board;

        return $passengers_on_board < $airplane_capacity ? [
            'capacity' => $airplane_capacity,
            'passengers' => $passengers_on_board,
            'rem' => $rem
        ] : false;
    }


}

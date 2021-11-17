<?php

namespace App\Http\Controllers;

use App\Exceptions\StaffException;
use App\Http\Requests\StaffCreateRequest;
use App\Models\Pilot;
use App\Models\PilotRating;
use App\Models\Staff;
use App\Models\StaffRole;
use Illuminate\Http\Request;
use App\Helper;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     * \Illuminate\Contracts\View\Factory
     * \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $search = \request()->get('search');
        $staffs = Staff::myStaffList();
        if ($search != '')
        {
            $staffs = Staff::myStaffList()->where(function ($query) use($search) {
                return $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('surname', 'LIKE', '%' . $search . '%');
            });
//            use full text search to perfect this area
        }
        $staffs = $staffs->latest()->paginate(12); //->pilotRating()
        return view('pages.staffs-list', [
            'staffs' => $staffs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $roles = StaffRole::orderBy('title')->get();
        $pilotRating = PilotRating::orderBy('rating')->get();
        return view('pages.create-staff', [
            'roles' => $roles,
            'rating' => $pilotRating
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StaffCreateRequest $staffCreateRequest, Helper $helper)
    {
        $data = $staffCreateRequest->validated();
        try {
            unset($data['pilot_rating_id']);
            $lastStaff = Staff::latest()->first()->id + 1;
            $empnum = 'EMP' . $helper->formatNumber($lastStaff);
            $data['empnum'] = $empnum;
            if ($staffCreateRequest->staff_role_id == 6) {
//                Session::put(['pilot_rating_id' => $staffCreateRequest->pilot_rating_id]);
                if(Staff::create($data)) {
                    Pilot::create([
                        'empnum' => $empnum,
                        'pilot_rating_id' => intval($staffCreateRequest->pilot_rating_id)
                    ]);
                } else {
                    throw new StaffException('Staff Could not be created');
                }
            } else {
                Staff::create($data);
            }
            $message = 'Staff Created Successfully';
            return back()->withSuccess([$message]);
        } catch (StaffException $staffException) {
            $message = $staffException->getMessage();
            return back()->withError([$message]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $data = Staff::where('staffs.id', $staff->id)
            ->leftjoin('pilots', 'staffs.empnum', '=', 'pilots.empnum')
            ->leftjoin('pilot_ratings', 'pilots.pilot_rating_id', '=', 'pilot_ratings.id')
            ->select('staffs.*', 'pilot_ratings.id as pilot_rating')
            ->first();

        $roles = StaffRole::orderBy('title')->get();
        $pilotRating = PilotRating::orderBy('rating')->get();

        return view('pages.edit-staff')
            ->withStaff($data)
            ->withRoles($roles)
            ->withRating($pilotRating);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return bool
     */
    public function update(Request $request, Staff $staff)
    {
        $updateData = $request->except(['_token', '_method', 'pilot_rating_id']);
        Validator::make($request->all(), [
            'pilot_rating_id' => 'required'//_if:staff_role_id,6'
        ], [
            'pilot_rating_id.required_if' => 'Pilot rating is required for any staff added as a pilot'
        ]);
        dd(21312);
        if($request->pilot_rating_id && $request->staff_role_id) {
            dd(2132);

            $update = $request->staff_role_id == 6 ?  $request->pilot_rating_id : null;

            $pilot = Pilot::whereEmpnum($staff->empnum);
            if ($pilot->exists()) {
                $pilot->update(['pilot_rating_id' => $update]);
            } else {
                Pilot::create([
                    'empnum' => $staff->empnum,
                    'pilot_rating_id' => $update
                ]);
            }
        }

        $updatedData = $staff->update($updateData);
        return back()->withSuccess('Done');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Staff $staff)
    {
//        dd($staff->id);
        Staff::find($staff->id)->delete();
        return back()->with('message', 'User Deleted Successfully');
    }
}

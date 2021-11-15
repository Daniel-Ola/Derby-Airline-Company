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
        $staffs = Staff::myStaffList()->latest()->paginate(12);
        if ($search != '')
        {
            $staffs = Staff::myStaffList()->where(function ($query) use($search) {
                return $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('surname', 'LIKE', '%' . $search . '%');
            })->latest()->paginate(12);
//            use full text search to perfect this area
        }
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
            if ($staffCreateRequest->pilot_rating_id == 6) {
//                Session::put(['pilot_rating_id' => $staffCreateRequest->pilot_rating_id]);
                if(Staff::create($data)) {
                    Pilot::create([
                        'empnum' => empnum,
                        'pilot_rating_id' => $staffCreateRequest->pilot_rating_id
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
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        dd('update');
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

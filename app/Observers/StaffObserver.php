<?php

namespace App\Observers;

use App\Models\Pilot;
use App\Models\Staff;
use Illuminate\Support\Facades\Session;

class StaffObserver
{
    /**
     * Handle the Staff "created" event.
     *
     * @param  \App\Models\Staff  $staff
     * @return void
     */
    public function created(Staff $staff)
    {
        if ($id = Session::get('pilot_rating_id'))
        {
            Pilot::create([
                'empnum' => $staff->empnum,
                'pilot_rating_id' => $id
            ]);
        }
    }

    /**
     * Handle the Staff "updated" event.
     *
     * @param  \App\Models\Staff  $staff
     * @return void
     */
    public function updated(Staff $staff)
    {
        //
    }

    /**
     * Handle the Staff "deleted" event.
     *
     * @param  \App\Models\Staff  $staff
     * @return void
     */
    public function deleted(Staff $staff)
    {
        //
    }

    /**
     * Handle the Staff "restored" event.
     *
     * @param  \App\Models\Staff  $staff
     * @return void
     */
    public function restored(Staff $staff)
    {
        //
    }

    /**
     * Handle the Staff "force deleted" event.
     *
     * @param  \App\Models\Staff  $staff
     * @return void
     */
    public function forceDeleted(Staff $staff)
    {
        //
    }
}

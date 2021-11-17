<?php

namespace App\Models;

use App\Observers\StaffObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'staffs';

    protected $fillable = [
        'empnum', 'surname', 'name', 'address', 'phone', 'salary', 'staff_role_id'
    ];

    public function pilots()
    {
        return $this->hasMany(Pilot::class, 'empnum', 'empnum');
    }

//    public function

    public function scopeMyPilots($query)
    {
        return $query->whereStaffRoleId(6)
            ->leftjoin('pilots', 'pilots.empnum', '=', 'staffs.empnum')
            ->leftjoin('pilot_ratings', 'pilots.pilot_rating_id', '=', 'pilot_ratings.id');
        //->where;
    }

    public function scopeMyStaffList($query)
    {
        return $query->join('staff_roles', 'staff_roles.id', '=', 'staffs.staff_role_id')
            ->leftjoin('pilots', 'staffs.empnum', '=', 'pilots.empnum')
            ->leftjoin('pilot_ratings', 'pilots.pilot_rating_id', '=', 'pilot_ratings.id')
            ->select('staffs.*', 'staff_roles.title as role', 'pilot_ratings.rating as pilot_rating');
    }

    public function scopePilotRating($query)
    {
        return $query->join('pilots', 'pilots.empnum', '=', 'staffs.empnum')
            ->join('pilot_ratings', 'pilot_ratings.id', '=', 'pilots.pilot_rating_id');
    }

    public function getFullNameAttribute() {
        return ucfirst($this->name) . ' ' . strtoupper($this->surname);
    }

    public function getStaffSalaryAttribute() {
        return '&#163; ' . number_format($this->salary, 2);
    }

//    public static function boot()
//    {
//        Staff::observe(StaffObserver::class);
//    }
}

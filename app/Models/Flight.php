<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flightnum', 'origin', 'dest', 'airplane_id', 'take_off_time', 'estimated_arrival_time'
    ];


    public function passengers()
    {
        return $this->hasMany(Passenger::class, 'flightnum', 'flightnum');
    }

    public function crewMembers()
    {
        return $this->hasMany(CrewMember::class, 'flightnum', 'flightnum');
    }

    public function airplane()
    {
        return $this->hasOne(Airplane::class, 'id', 'airplane_id');
    }

    public function scopeMembers($query)
    {
        return $query->with('airplane')
            ->with('passengers')
            ->with('crewmembers');
    }

    public function scopeCompleted($query) {
        return $query->whereStatus('completed');
    }

    public function scopeWaiting($query) {
        return $query->whereStatus('waiting');
    }

    public function scopeCreated($query) {
        return $query->whereStatus('created');
    }

    public function scopeInProgress($query) {
        return $query->whereStatus('in-progress');
    }

    public function scopeActivePassengers($query) {
        return $query->where('status', '<>', 'completed');
    }

    public function getFlightStatusAttribute()
    {
        $status = [
            'in-progress' => 'In Progress',
            'completed' => 'Completed',
            'waiting' => 'Waiting'
        ];

        return $status[$this->status];
    }
}

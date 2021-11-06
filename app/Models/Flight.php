<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory, SoftDeletes;



    public function passengers()
    {
        return $this->hasMany(Passenger::class, 'FLIGHTNUM', 'FLIGHTNUM');
    }

    public function scopeCompleted($query) {
        return $query->whereStatus('completed');
    }

    public function scopeWaiting($query) {
        return $query->whereStatus('completed');
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
}

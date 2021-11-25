<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airplane extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'manufacturer', 'numser', 'capacity', 'model_number', 'pilot_rating_id'
    ];

    public function flights()
    {
        return $this->belongsToMany(Flight::class);
    }

    public function pilots()
    {
        return $this->hasMany(Pilot::class, 'pilot_rating_id', 'pilot_rating_id');
    }

    public function getAirplaneModelAttribute()
    {
        return $this->manufacturer . ' ' . $this->model_number;
    }

    public function scopePassengers($query)
    {
        $query->leftjoin('flights as f', 'f.airplane_id', '=', 'airplanes.id')
            ->leftjoin('passengers as p', 'p.flightnum', '=', 'f.flightnum')
            ->distinct('airplanes.id')
            ->orderBy('airplanes.id');
    }
}

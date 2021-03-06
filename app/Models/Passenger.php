<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passenger extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];



    public function flight()
    {
        return $this->belongsTo(Flight::class);//, 'flightnum', 'flightnum');
    }
}

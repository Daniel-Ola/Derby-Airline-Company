<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewMember extends Model
{
    use HasFactory;

//    public function flights()
//    {
//        return $this->belongsToMany(Flight::class, 'flightnum', 'flightnum')
//    }

//    public function staff()
//    {
//        return $this->belongsTo(Staff::class, 'empnum', 'empnum');
//    }

}

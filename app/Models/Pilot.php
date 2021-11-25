<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pilot extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'empnum', 'pilot_rating_id'
    ];

    public function staffs()
    {
        return $this->belongsTo(Staff::class, 'empnum', 'empnum');
    }

    public function airplanes()
    {
        return $this->belongsTo(Airplane::class,  'pilot_rating_id', 'pilot_rating_id');
    }
}

<?php

namespace App\Models;

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

    public function scopePilots($query)
    {
//        return $query->where()
    }
}

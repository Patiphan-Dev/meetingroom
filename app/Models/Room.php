<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_name',
        'room_details',
        'room_facilities',
        'room_img_path',
        'room_status',
        
        'maintenance',
        'utilities',
        'officer_compensation',
        'other_expenses',
        'total',
        'damage_insurance'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'bk_room_id',
        'bk_user_id',
        'bk_str_date',
        'bk_end_date',
        'bk_str_time',
        'bk_end_time',
        'bk_slip',
        'bk_slip2',
        'bk_node',
        'bk_status',

        'bk_confirm',
        'bk_location_for',
        'bk_people_number',
        'bk_music_band',
        'bk_music_band2',
        'bk_list1',
        'bk_list2',
        'bk_list3',
        'bk_list4',
        'bk_list5',
        'bk_list1_note',
        'bk_list2_note',
        'bk_list3_note',
        'bk_list4_note',
        'bk_list5_note',

        // 'maintenance',
        // 'utilities',
        // 'officer_compensation',
        // 'other_expenses',
        // 'total',
        // 'damage_insurance'
    ];
}

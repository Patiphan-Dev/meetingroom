<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Rule;
use App\Models\Booking;


class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'หน้าแรก'
        ];
        $rooms = Room::all();
        $rules = Rule::find(1);
        return view('home', compact('rooms', 'rules'), $data);
    }

    public function about()
    {
        $data = [
            'title' => 'เกี่ยวกับเรา'
        ];
        return view('about', $data);
    }

    public function history($id)
    {
        $data = [
            'title' => 'ประวัติการจอง'
        ];
        $history = Booking::where('bk_user_id', auth()->user()->id)
            ->join('rooms', 'bookings.bk_room_id', 'rooms.id')
            ->join('users', 'bookings.bk_user_id', 'users.id')
            ->select('rooms.*', 'bookings.*')->get();
        return view('history', compact('history'), $data);
    }
}

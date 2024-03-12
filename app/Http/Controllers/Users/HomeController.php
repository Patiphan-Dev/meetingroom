<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;
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


        $history = Booking::where('bk_user_id', auth()->user()->id)
        ->join('rooms', 'bookings.bk_room_id', 'rooms.id')
        ->join('users', 'bookings.bk_user_id', 'users.id')
        ->select('rooms.*', 'bookings.*')->get();
        $countbooking = Booking::where('bk_user_id', auth()->user()->id)->where('bk_status', 3)->count();
        $booking = Booking::where('bk_user_id', auth()->user()->id)->get();
        $rooms = Room::all();
        $rules = Rule::find(1);

        return view('home', compact('rooms', 'rules', 'booking', 'countbooking', 'history'), $data);
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
        $countbooking = Booking::where('bk_user_id', auth()->user()->id)->where('bk_status', 3)->count();
        $history = Booking::where('bk_user_id', auth()->user()->id)
            ->join('rooms', 'bookings.bk_room_id', 'rooms.id')
            ->join('users', 'bookings.bk_user_id', 'users.id')
            ->select('rooms.*', 'bookings.*')->get();
        return view('history', compact('history', 'countbooking'), $data);
    }
}

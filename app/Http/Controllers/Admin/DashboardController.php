<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'แดชบอร์ด'
        ];
        $rooms = Room::all();
        $bookings = Booking::all();
        $bookday = Booking::where('bk_str_date', Carbon::now()->toDateString())->get();
        $bookstatus = Booking::where('bk_status', 2)->get();
        // dd(Carbon::now()->toDateString());
        return view('admin.dashboard', compact('rooms', 'bookings', 'bookday','bookstatus'), $data);
    }
}

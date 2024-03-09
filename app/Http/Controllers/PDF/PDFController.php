<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use PDF;

class PDFController extends Controller
{
    public function index($id)
    {
        $data = [
            'title' => 'ปริ้นเอกสารการจอง'
        ];

        $booking = Booking::join('rooms', 'bookings.bk_room_id', 'rooms.id')
            ->join('users', 'bookings.bk_user_id', 'users.id')
            ->select(
                'rooms.*',
                'users.*',
                'bookings.*'
            )->where('bookings.id', $id)->get();


        $pdf = PDF::loadView('PDF', compact('booking'), $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('เอกสารการจอง.pdf');
    }
}

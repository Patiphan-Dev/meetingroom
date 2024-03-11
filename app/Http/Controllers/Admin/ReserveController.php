<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Room;
use File;
use Carbon\Carbon;

class ReserveController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'การจอง'
        ];
        // ดึงข้อมูลตาราง bookings join ตาราง rooms
        $bookings = Booking::join('rooms', 'bookings.bk_room_id', 'rooms.id')->join('users', 'bookings.bk_user_id', 'users.id')->select('bookings.*', 'rooms.room_name', 'users.fullname')->get();
        //ดึงข้อมูลตาราง Room ทั้งหมด
        $rooms = Room::all();
        return view('admin.reserve', compact('bookings', 'rooms'), $data);
    }

    public function viewReserve($id)
    {
        $data = [
            'title' => 'การจอง'
        ];
        // ดึงข้อมูลตาราง bookings join ตาราง rooms
        $booking = Booking::find($id)->join('rooms', 'bookings.bk_room_id', 'rooms.id')->join('users', 'bookings.bk_user_id', 'users.id')->select('rooms.*', 'users.*','bookings.*','bookings.id' )->get();
        //ดึงข้อมูลตาราง Room ทั้งหมด
        $rooms = Room::all();
        $id = $id;
        return view('admin.viewReserve', compact('booking', 'rooms', 'id'), $data);
    }

    public function updateReserve(Request $request, $id)
    {
        Booking::find($id)->update(
            [
                'bk_status' => $request->bk_status,
                'bk_node' => $request->bk_node,
            ]
        );
        Alert::success('สำเร็จ', 'อัพเดทสสถานะการจองสำเร็จ');
        return redirect()->back()->with('success', 'อัพเดทสสถานะการจองสำเร็จ');
    }

    public function deleteReserve($id)
    {
        Booking::find($id)->delete();
        Alert::success('สำเร็จ', 'ลบข้อมูสำเร็จ');
        return redirect()->back()->with('success', 'ลบข้อมูสำเร็จ');
    }
}

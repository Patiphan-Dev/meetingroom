<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use RealRashid\SweetAlert\Facades\Alert;
use File;
use Carbon\Carbon;

class BookingController extends Controller
{
    // public function index($id)
    // {
    //     $data = [
    //         'title' => 'จองหอประชุม'
    //     ];
    //     $booking = Booking::where('bk_room_id', $id)->join('rooms', 'bookings.bk_room_id', 'rooms.id')->select('bookings.*', 'rooms.room_name')->orderBy('created_at', 'desc')->get();
    //     $history = Booking::where('bk_user_id', auth()->user()->username)->join('rooms', 'bookings.bk_room_id', 'rooms.id')->select('bookings.*', 'rooms.room_name')->orderBy('created_at', 'desc')->paginate(10);
    //     $bookings = Booking::join('rooms', 'bookings.bk_room_id', 'rooms.id')->select('bookings.*', 'rooms.room_name')->orderBy('created_at', 'desc')->get();
    //     $room = Room::find($id);
    //     $rooms = Room::all();
    //     return view('booking', compact('booking', 'bookings', 'rooms', 'room', 'history'), $data);
    // }

    // public function indexAll()
    // {
    //     $data = [
    //         'title' => 'จองหอประชุม'
    //     ];
    //     $booking = Booking::join('rooms', 'bookings.bk_room_id', 'rooms.id')->select('bookings.*', 'rooms.room_name')->orderBy('created_at', 'desc')->get();
    //     $history = Booking::where('bk_user_id', auth()->user()->username)->join('rooms', 'bookings.bk_room_id', 'rooms.id')->select('bookings.*', 'rooms.room_name')->orderBy('created_at', 'desc')->get();
    //     $bookings = Booking::join('rooms', 'bookings.bk_room_id', 'rooms.id')->select('bookings.*', 'rooms.room_name')->orderBy('created_at', 'desc')->get();
    //     $rooms = Room::all();
    //     $search = '';
    //     return view('booking', compact('booking', 'bookings', 'rooms', 'search', 'history'), $data);
    // }

    public function getRoom($id)
    {
        $data = [
            'title' => 'ข้อมูลหอประชุม'
        ];
        $booking = Booking::where('bk_room_id', $id)
            ->join('rooms', 'bookings.bk_room_id', 'rooms.id')
            ->join('users', 'bookings.bk_user_id', 'users.id')
            ->select('rooms.*', 'users.*', 'bookings.*')->get();
        $history = Booking::where('bk_user_id', auth()->user()->id)
            ->join('rooms', 'bookings.bk_room_id', 'rooms.id')
            ->join('users', 'bookings.bk_user_id', 'users.id')
            ->select('rooms.*', 'users.*', 'bookings.*')->get();
        $bookings = Booking::join('rooms', 'bookings.bk_room_id', 'rooms.id')->select('bookings.*', 'rooms.room_name')->orderBy('created_at', 'desc')->get();

        $rooms = Room::all();
        $room = Room::find($id);
        return view('room', compact('rooms', 'room', 'booking', 'bookings', 'rooms', 'room', 'history'), $data);
    }


    public function addBooking(Request $request, $id)
    {
        $booking = new Booking;
        $booking->bk_room_id = $id;
        $booking->bk_user_id = auth()->user()->id;
        $booking->bk_status = 1;
        $booking->save();
        $booking_id = $booking->id;

        return redirect()->route('getRoom', ['id' => $id, 'step' => 2, 'booking_id' => $booking_id])->with('สำเร็จ', 'จองหอประชุมสำเสร็จ');
    }

    public function Confirm(Request $request, $id)
    {
        $booking = Booking::find($id);

        Booking::find($request->booking_id)->update(
            [
                'bk_confirm' => $request->bk_confirm,
            ]
        );

        return redirect()->route('getRoom', ['id' => $id, 'step' => 3, 'booking_id' => $request->booking_id])->with('สำเร็จ', 'จองหอประชุมสำเสร็จ');
    }

    public function formBooking(Request $request, $id)
    {
        Booking::find($id)->update(
            [

                'bk_str_date' => $request->bk_str_date,
                'bk_end_date' => $request->bk_end_date,
                'bk_str_time' => $request->bk_str_time,
                'bk_end_time' => $request->bk_end_time,

                'bk_location_for' => $request->bk_location_for,
                'bk_people_number' => $request->bk_people_number,

                'bk_music_brand' => $request->bk_music_brand,
                'bk_music_equipment' => $request->bk_music_equipment,
                'bk_music_details' => $request->bk_music_details,
                'bk_sound' => $request->bk_sound,
                'bk_sound_node' => $request->bk_sound_node,
                'bk_screen_big' => $request->bk_screen_big,
                'bk_screen_big_note' => $request->bk_screen_big_note,
                'bk_tv_left' => $request->bk_tv_left,
                'bk_tv_left_note' => $request->bk_tv_left_note,
                'bk_tv_right' => $request->bk_tv_right,
                'bk_tv_right_note' => $request->bk_tv_right_note,
                'bk_table' => $request->bk_table,
                'bk_table_note' => $request->bk_table_note,

            ]
        );

        return redirect()->route('getRoom', ['id' => $request->room_id, 'step' => 4, 'booking_id' => $id])->with('สำเร็จ', 'จองหอประชุมสำเสร็จ');
    }

    public function PayDeposit(Request $request,$id)
    {
        // ตึงข้อมูลตามไอดีมาตรวจสอบสลิป
        $booking = Booking::find($id);

        $date = date("Y-m-d");
        $time = date("His");
        $file = $request->file('bk_slip');

        // ลบรูปภาพในโฟลเดอร์
        $img_path = $booking->bk_slip;
        if ($img_path) {
            $image_path = public_path($img_path);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        // เพิ่มรูปภาพเข้าไปใหม่
        $bk_slip =  $date . '-' . $time . '-slipe-' . auth()->user()->username;
        $ext = strtolower($file->getClientOriginalExtension());
        $image_full_name = $bk_slip . '.' . $ext;
        $uploade_path = 'uploads/slips/';
        $image_url = $uploade_path . $image_full_name;
        $file->move($uploade_path, $image_full_name);

        Booking::find($id)->update(
            [
                'bk_slip' => $image_url,
            ]
        );

        return redirect()->route('history', ['id' => auth()->user()->id, 'user' =>  auth()->user()->username])->with('สำเร็จ', 'ชำระเงินค่ามัดจำสำเสร็จ');
    }

    // public function editBooking($id)
    // {
    //     $Booking = Booking::find($id);
    //     return view('booking', compact('Booking'));
    // }

    // public function updateBooking(Request $request, $id)
    // {
    //     // เช็กช่วงเวลาที่จอง
    //     $bk_room_id = $request->bk_room_id;
    //     $bk_date = $request->bk_date;
    //     $checkin = $request->bk_str_time;
    //     $checkout = $request->bk_end_time;

    //     $bookings = Booking::where(function ($query) use ($id, $bk_room_id, $bk_date, $checkin, $checkout) {
    //         $query->where(function ($query) use ($id, $bk_room_id, $bk_date, $checkin, $checkout) {
    //             $query->where('id', '!=', $id)
    //                 ->where('bk_room_id', $bk_room_id)
    //                 ->where('bk_date', $bk_date)
    //                 ->where('bk_str_time', '>=', $checkin)
    //                 ->where('bk_str_time', '<', $checkout);
    //         })
    //             ->orWhere(function ($query) use ($id, $bk_room_id, $bk_date, $checkin, $checkout) {
    //                 $query->where('id', '!=', $id)
    //                     ->where('bk_room_id', $bk_room_id)
    //                     ->where('bk_date', $bk_date)
    //                     ->where('bk_end_time', '>', $checkin)
    //                     ->where('bk_end_time', '<=', $checkout);
    //             });
    //     })
    //         ->orWhere(function ($query) use ($id, $bk_room_id, $bk_date, $checkin, $checkout) {
    //             $query->where('id', '!=', $id)
    //                 ->where('bk_room_id', $bk_room_id)
    //                 ->where('bk_date', $bk_date)
    //                 ->where('bk_str_time', '<=', $checkin)
    //                 ->where('bk_end_time', '>=', $checkout);
    //         })
    //         ->first();


    //     // คำนวณจำนวนชั่วโมง
    //     $hoursCheckIn = Carbon::parse($request->bk_str_time);
    //     $hoursCheckOut = Carbon::parse($request->bk_end_time);
    //     // Calculate the difference in minutes
    //     $minutes = $hoursCheckIn->diffInMinutes($hoursCheckOut);

    //     $getprice = rooms::find($request->bk_room_id);

    //     $price = ($getprice->room_price / 60) * $minutes;
    //     $totalPrice = round($price);
    //     // dd($getprice->room_price,  $minutes, $totalPrice);


    //     // ตึงข้อมูลตามไอดีมาตรวจสอบสลิป
    //     $booking = Booking::find($id);

    //     $date = date("Y-m-d");
    //     $time = date("His");
    //     $file = $request->file('bk_slip');

    //     if ($file) {

    //         // ลบรูปภาพในโฟลเดอร์
    //         $img_path = $booking->bk_slip;
    //         if ($img_path) {
    //             $image_path = public_path($img_path);
    //             if (File::exists($image_path)) {
    //                 File::delete($image_path);
    //             }
    //         }

    //         // เพิ่มรูปภาพเข้าไปใหม่
    //         $bk_slip =  $date . '-' . $time . '-slipe-' . auth()->user()->username;
    //         $ext = strtolower($file->getClientOriginalExtension());
    //         $image_full_name = $bk_slip . '.' . $ext;
    //         $uploade_path = 'uploads/slips/';
    //         $image_url = $uploade_path . $image_full_name;
    //         $file->move($uploade_path, $image_full_name);

    //         if ($bookings == null) {
    //             // อัพเดทข้อมูลการจอง
    //             Booking::find($id)->update(
    //                 [
    //                     'bk_room_id' => $request->bk_room_id,
    //                     'bk_date' => $request->bk_date,
    //                     'bk_str_time' => $request->bk_str_time,
    //                     'bk_end_time' => $request->bk_end_time,
    //                     'bk_slip' => $image_url,
    //                     'bk_sumtime' => $minutes,
    //                     'bk_total_price' => $totalPrice,
    //                     'bk_status' => 2,
    //                 ]
    //             );
    //             Alert::success('สำเร็จ', 'รอตรวจสอบจากแอดมิน');
    //             return redirect()->back()->with('สำเร็จ', 'รอตรวจสอบจากแอดมิน');
    //         } else {
    //             Alert::error('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
    //             return redirect()->back()->with('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
    //         }
    //     } else {
    //         if ($bookings == null) {
    //             Booking::find($id)->update(
    //                 [
    //                     'bk_room_id' => $request->bk_room_id,
    //                     'bk_date' => $request->bk_date,
    //                     'bk_str_time' => $request->bk_str_time,
    //                     'bk_end_time' => $request->bk_end_time,
    //                     'bk_sumtime' => $minutes,
    //                     'bk_total_price' => $totalPrice,
    //                     'bk_status' => 1,
    //                 ]
    //             );
    //             Alert::success('สำเร็จ', 'รอตรวจสอบจากแอดมิน');
    //             return redirect()->back()->with('สำเร็จ', 'รอตรวจสอบจากแอดมิน');
    //         } else {
    //             Alert::error('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
    //             return redirect()->back()->with('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
    //         }
    //     }
    //     Alert::success('สำเร็จ', 'อัพเดทข้อมูลสำเร็จ');
    //     return redirect()->back()->with('success', 'อัพเดทข้อมูลสำเร็จ');
    // }

    public function deleteBooking($id)
    {
        Booking::find($id);
        Alert::success('สำเร็จ', 'ลบข้อมูสำเร็จ');
        return redirect()->back()->with('success', 'ลบข้อมูสำเร็จ');
    }
}

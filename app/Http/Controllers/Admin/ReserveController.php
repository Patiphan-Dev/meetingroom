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
        $bookings = Booking::join('rooms', 'bookings.bk_room_id', 'rooms.id')->join('users', 'bookings.bk_user_id', 'users.id')->select('bookings.*', 'rooms.room_name','users.fullname')->get();
        //ดึงข้อมูลตาราง Room ทั้งหมด
        $rooms = Room::all();
        return view('admin.reserve', compact('bookings', 'rooms'), $data);
    }

    public function addReserve(Request $request)
    {
        // เช็กช่วงเวลาที่จอง
        $bk_room_id = $request->bk_room_id;
        $bk_date = $request->bk_date;
        $checkin = $request->bk_str_time;
        $checkout = $request->bk_end_time;

        $reserve = Booking::where(function ($query) use ($bk_room_id, $bk_date, $checkin, $checkout) {
            $query->where(function ($query) use ($bk_room_id, $bk_date, $checkin, $checkout) {
                $query->where('bk_room_id', $bk_room_id)
                    ->where('bk_date', $bk_date)
                    ->where('bk_str_time', '>=', $checkin)
                    ->where('bk_str_time', '<', $checkout);
            })
                ->orWhere(function ($query) use ($bk_room_id, $bk_date, $checkin, $checkout) {
                    $query->where('bk_room_id', $bk_room_id)
                        ->where('bk_date', $bk_date)
                        ->where('bk_end_time', '>', $checkin)
                        ->where('bk_end_time', '<=', $checkout);
                });
        })
            ->orWhere(function ($query) use ($bk_room_id, $bk_date, $checkin, $checkout) {
                $query->where('bk_room_id', $bk_room_id)
                    ->where('bk_date', $bk_date)
                    ->where('bk_str_time', '<=', $checkin)
                    ->where('bk_end_time', '>=', $checkout);
            })
            ->first();


        // คำนวณจำนวนชั่วโมง
        $hoursCheckIn = Carbon::parse($request->bk_str_time);
        $hoursCheckOut = Carbon::parse($request->bk_end_time);
        // Calculate the difference in minutes
        $minutes = $hoursCheckIn->diffInMinutes($hoursCheckOut);

        $getprice = Room::find($request->bk_room_id);

        $price = ($getprice->room_price / 60) * $minutes;
        $totalPrice = round($price);
        // dd($getprice->room_price,  $minutes, $totalPrice);


        // dd($booking);
        if ($reserve == null) {
            //บันทึกข้อมูล;
            $reserve = new Booking;
            $reserve->bk_room_id = $request->bk_room_id;
            $reserve->bk_username = auth()->user()->username;
            $reserve->bk_date = $request->bk_date;
            $reserve->bk_str_time = $request->bk_str_time;
            $reserve->bk_end_time = $request->bk_end_time;
            $reserve->bk_sumtime = $minutes;
            $reserve->bk_total_price = $totalPrice;
            $reserve->bk_status = 1;
            $reserve->save();

            Alert::success('สำเร็จ', 'จองหอประชุมสำเร็จ');
            return redirect()->back()->with('สำเร็จ', 'จองหอประชุมสำเร็จ');
        } else {

            Alert::error('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
            return redirect()->back()->with('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
        }
    }

    public function editReserve($id)
    {
        $reserve = Booking::find($id);
        return view('admin.reserve', compact('reserve'));
    }

    public function updateReserve(Request $request, $id)
    {
        // เช็กช่วงเวลาที่จอง
        $bk_room_id = $request->bk_room_id;
        $bk_date = $request->bk_date;
        $checkin = $request->bk_str_time;
        $checkout = $request->bk_end_time;

        $bookings = Booking::where(function ($query) use ($id, $bk_room_id, $bk_date, $checkin, $checkout) {
            $query->where(function ($query) use ($id, $bk_room_id, $bk_date, $checkin, $checkout) {
                $query->where('id', '!=', $id)
                    ->where('bk_room_id', $bk_room_id)
                    ->where('bk_date', $bk_date)
                    ->where('bk_str_time', '>=', $checkin)
                    ->where('bk_str_time', '<', $checkout);
            })
                ->orWhere(function ($query) use ($id, $bk_room_id, $bk_date, $checkin, $checkout) {
                    $query->where('id', '!=', $id)
                        ->where('bk_room_id', $bk_room_id)
                        ->where('bk_date', $bk_date)
                        ->where('bk_end_time', '>', $checkin)
                        ->where('bk_end_time', '<=', $checkout);
                });
        })
            ->orWhere(function ($query) use ($id, $bk_room_id, $bk_date, $checkin, $checkout) {
                $query->where('id', '!=', $id)
                    ->where('bk_room_id', $bk_room_id)
                    ->where('bk_date', $bk_date)
                    ->where('bk_str_time', '<=', $checkin)
                    ->where('bk_end_time', '>=', $checkout);
            })
            ->first();


        // คำนวณจำนวนชั่วโมง
        $hoursCheckIn = Carbon::parse($request->bk_str_time);
        $hoursCheckOut = Carbon::parse($request->bk_end_time);
        // Calculate the difference in minutes
        $minutes = $hoursCheckIn->diffInMinutes($hoursCheckOut);

        $getprice = Room::find($request->bk_room_id);

        $price = ($getprice->room_price / 60) * $minutes;
        $totalPrice = round($price);
        // dd($getprice->room_price,  $minutes, $totalPrice);


        // ตึงข้อมูลตามไอดีมาตรวจสอบสลิป
        $booking = Booking::find($id);

        $date = date("Y-m-d");
        $time = date("His");
        $file = $request->file('bk_slip');

        if ($file) {

            $img_path = $booking->bk_slip;
            if ($img_path) {
                $image_path = public_path('/' . $img_path);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $bk_slip =  $date . '-' . $time . '-slipe-' . auth()->user()->username;
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $bk_slip . '.' . $ext;
            $uploade_path = 'uploads/slips/';
            $image_url = $uploade_path . $image_full_name;
            $file->move($uploade_path, $image_full_name);

            if ($bookings == null) {
                Booking::find($id)->update(
                    [
                        'bk_room_id' => $request->bk_room_id,
                        'bk_date' => $request->bk_date,
                        'bk_str_time' => $request->bk_str_time,
                        'bk_end_time' => $request->bk_end_time,
                        'bk_slip' => $image_url,
                        'bk_sumtime' => $minutes,
                        'bk_total_price' => $totalPrice,
                        'bk_status' => $request->bk_status,
                        'bk_node' => $request->bk_node,
                    ]
                );
                Alert::success('สำเร็จ', 'รอตรวจสอบจากแอดมิน');
                return redirect()->back()->with('สำเร็จ', 'รอตรวจสอบจากแอดมิน');
            } else {
                Alert::error('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
                return redirect()->back()->with('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
            }
        } else {
            if ($bookings == null) {
                Booking::find($id)->update(
                    [
                        'bk_room_id' => $request->bk_room_id,
                        'bk_date' => $request->bk_date,
                        'bk_str_time' => $request->bk_str_time,
                        'bk_end_time' => $request->bk_end_time,
                        'bk_sumtime' => $minutes,
                        'bk_total_price' => $totalPrice,
                        'bk_status' => $request->bk_status,
                        'bk_node' => $request->bk_node,
                    ]
                );
                Alert::success('สำเร็จ', 'รอตรวจสอบจากแอดมิน');
                return redirect()->back()->with('สำเร็จ', 'รอตรวจสอบจากแอดมิน');
            } else {
                Alert::error('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
                return redirect()->back()->with('ไม่สำเร็จ', 'ไม่สามารถจองในช่วงเวลาดังกล่าวได้');
            }
        }
        Alert::success('สำเร็จ', 'อัพเดทข้อมูลสำเร็จ');
        return redirect()->back()->with('success', 'อัพเดทข้อมูลสำเร็จ');
    }

    public function deleteReserve($id)
    {
        Booking::find($id)->delete();
        Alert::success('สำเร็จ', 'ลบข้อมูสำเร็จ');
        return redirect()->back()->with('success', 'ลบข้อมูสำเร็จ');
    }
}

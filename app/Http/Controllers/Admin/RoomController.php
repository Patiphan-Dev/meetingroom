<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'หอประชุม'
        ];
        $rooms = Room::all();
        return view('admin.room', compact('rooms'), $data);
    }

    public function addRoom(Request $request)
    {
        $date = date("Y-m-d");

        if ($files = $request->file('room_img_path')) {
            $i = 1;
            foreach ($files as $file) {
                $room_img_path =  $request->room_name . '-' . $date . '-img-' . $i++;
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $room_img_path . '.' . $ext;
                $uploade_path = 'uploads/room/';
                $image_url = $uploade_path . $image_full_name;
                $file->move($uploade_path, $image_full_name);
                $arr[] = $image_url;
            }
            $room_img_path = implode(",", $arr);

            //บันทึกข้อมูล
            $Room = new room;
            $Room->room_name = $request->room_name;
            $Room->room_details = $request->room_details;
            $Room->room_facilities = $request->room_facilities;
            $Room->room_img_path = $room_img_path;
            $Room->maintenance = $request->maintenance;
            $Room->utilities = $request->utilities;
            $Room->officer_compensation = $request->officer_compensation;
            $Room->other_expenses = $request->other_expenses;
            $Room->total = $request->total;
            $Room->damage_insurance = $request->damage_insurance;
            $Room->room_status = '1';
            $Room->save();
        }

        Alert::success('สำเร็จ', 'บันทึกข้อมูลสำเร็จ');
        return redirect()->back()->with('สำเร็จ', 'บันทึกข้อมูลสำเร็จ');
    }

    public function editRoom($id)
    {
        $room = Room::find($id);
        return view('admin.room', compact('room'));
    }

    public function updateRoom(Request $request, $id)
    {

        if ($request->room_img_path != null) {

            $room = Room::find($id);
            $img_paths = explode(',', $room->room_img_path);
            foreach ($img_paths as $img) {
                $image_path = public_path('/' . $img);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $date = date("Y-m-d");

            if ($files = $request->file('room_img_path')) {
                $i = 1;
                foreach ($files as $file) {
                    $room_img_path =  $request->room_name . '-' . $date . '-img-' . $i++;
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $room_img_path . '.' . $ext;
                    $uploade_path = 'uploads/room/';
                    $image_url = $uploade_path . $image_full_name;
                    $file->move($uploade_path, $image_full_name);
                    $arr[] = $image_url;
                }
                $room_img_path = implode(",", $arr);

                //อัพเดทข้อมูล
                Room::find($id)->update(
                    [
                        'room_name' => $request->room_name,
                        'room_details' => $request->room_details,
                        'room_facilities' => $request->room_facilities,
                        'room_img_path' => $room_img_path,
                        'maintenance' => $request->maintenance,
                        'utilities' => $request->utilities,
                        'officer_compensation' => $request->officer_compensation,
                        'other_expenses' => $request->other_expenses,
                        'total' => $request->total,
                        'damage_insurance' => $request->damage_insurance,
                        'room_status' => $request->room_status,
                    ]
                );
            }
        } else {
            //อัพเดทข้อมูล
            Room::find($id)->update(
                [
                    'room_name' => $request->room_name,
                    'room_details' => $request->room_details,
                    'room_facilities' => $request->room_facilities,
                    'maintenance' => $request->maintenance,
                    'utilities' => $request->utilities,
                    'officer_compensation' => $request->officer_compensation,
                    'other_expenses' => $request->other_expenses,
                    'total' => $request->total,
                    'damage_insurance' => $request->damage_insurance,
                    'room_status' => $request->room_status,
                ]
            );
        }

        Alert::success('สำเร็จ', 'อัพเดทข้อมูลสำเร็จ');
        return redirect()->back()->with('success', 'อัพเดทข้อมูลสำเร็จ');
    }

    public function deleteRoom($id)
    {
        $room = Room::find($id);
        $img_paths = explode(',', $room->room_img_path);
        foreach ($img_paths as $img) {
            $image_path = public_path('/' . $img);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        Room::find($id)->delete();
        // Alert::success('สำเร็จ', 'ลบข้อมูสำเร็จ');
        return redirect()->back()->with('success', 'ลบข้อมูสำเร็จ');
    }

    public function getRoom($id)
    {
        $data = [
            'title' => 'ข้อมูลหอประชุม'
        ];
        $rooms = Room::all();
        $room = Room::find($id);
        return view('Room', compact('rooms', 'room'), $data);
    }
}

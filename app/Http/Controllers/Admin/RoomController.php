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
        $files = $request->file('room_img_path');
        $diagrams = $request->file('room_diagram_path');

        if ($files) {
            $i = 1;
            foreach ($files as $file) {
                $room_img_path =  $request->room_name . '-' . $date . '-img-' . $i++;
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $room_img_path . '.' . $ext;
                $uploade_path = 'uploads/room/';
                $image_url = $uploade_path . $image_full_name;
                $file->move($uploade_path, $image_full_name);
                $image_arr[] = $image_url;
            }
            $room_img_path = implode(",", $image_arr);

            foreach ($diagrams as $diagram) {
                $room_diagram_path =  $request->room_name . '-' . $date . '-diagram-' . $i++;
                $ext = strtolower($diagram->getClientOriginalExtension());
                $diagram_full_name = $room_diagram_path . '.' . $ext;
                $uploade_path = 'uploads/diagrams/';
                $diagram_url = $uploade_path . $diagram_full_name;
                $diagram->move($uploade_path, $diagram_full_name);
                $diagram_arr[] = $diagram_url;
            }
            $room_diagram_path = implode(",", $diagram_arr);
            
            //บันทึกข้อมูล
            $room = new room;
            $room->room_name = $request->room_name;
            $room->room_details = $request->room_details;
            $room->room_img_path = $room_img_path;
            $room->room_diagram_path = $room_diagram_path;
            $room->maintenance = $request->maintenance;
            $room->utilities = $request->utilities;
            $room->officer_compensation = $request->officer_compensation;
            $room->other_expenses = $request->other_expenses;
            $room->total = $request->total;
            $room->damage_insurance = $request->damage_insurance;
            $room->room_status = '1';
            $room->save();
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

        if ($request->room_img_path != null ) {
            
            $room = Room::find($id);
            $img_paths = explode(',', $room->room_img_path);
            $diagram_paths = explode(',', $room->room_diagram_path);

            foreach ($img_paths as $img) {
                $image_path = public_path('/' . $img);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            foreach ($diagram_paths as $diagram) {
                $diagram_path = public_path('/' . $diagram);
                if (File::exists($diagram_path)) {
                    File::delete($diagram_path);
                }
            }
            $date = date("Y-m-d");
            $files = $request->file('room_img_path');
            $diagrams = $request->file('room_diagram_path');

            if ($files) {
                foreach ($files as $file) {
                    $room_img_path =  $request->room_name . '-' . $date . '-img-' . $i++;
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $room_img_path . '.' . $ext;
                    $uploade_path = 'uploads/room/';
                    $image_url = $uploade_path . $image_full_name;
                    $file->move($uploade_path, $image_full_name);
                    $image_arr[] = $image_url;
                }
                $room_img_path = implode(",", $image_arr);
    
                foreach ($diagrams as $diagram) {
                    $room_diagram_path =  $request->room_name . '-' . $date . '-diagram-' . $i++;
                    $ext = strtolower($diagram->getClientOriginalExtension());
                    $diagram_full_name = $room_diagram_path . '.' . $ext;
                    $uploade_path = 'uploads/diagrams/';
                    $diagram_url = $uploade_path . $diagram_full_name;
                    $diagram->move($uploade_path, $diagram_full_name);
                    $diagram_arr[] = $diagram_url;
                }
                $room_diagram_path = implode(",", $diagram_arr);

                //อัพเดทข้อมูล
                Room::find($id)->update(
                    [
                        'room_name' => $request->room_name,
                        'room_details' => $request->room_details,
                        'room_img_path' => $room_img_path,
                        'room_diagram_path' => $room_diagram_path,
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

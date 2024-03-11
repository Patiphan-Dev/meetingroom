<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Booking;
use App\Models\Room;

class AuthController extends Controller
{
    public function getLogin()
    {
        $data = [
            'title' => 'จองหอประชุม'
        ];
        $rooms = Room::all();
        // $bookings = Booking::join('rooms', 'bookings.bk_room_id', 'rooms.id')->select('bookings.*', 'rooms.room_name')->orderBy('created_at', 'desc')->get();
        return view('auth.login',compact( 'rooms'), $data);
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|string|max:30',
                'password' => 'required|min:8',
            ],
            [
                'username.required' => 'กรุณากรอกชื่อผู้ใช้งาน',
                'password.required' => 'กรุณากรอกรหัสผ่าน',
            ]
        );

        $validated = auth()->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ], $request->password);

        $request->session()->regenerate();

        if ($validated) {
            if (auth()->user()->status == 1) {
                Alert::success('สำเร็จ', 'เข้าสู่ระบบสำเร็จ');
                return redirect()->route('home')->with('success', 'เข้าสู่ระบบสำเร็จ');
            }
            
            if (auth()->user()->status == 9) {
                Alert::success('สำเร็จ', 'เข้าสู่ระบบสำเร็จ');
                return redirect()->route('dashboard')->with('success', 'เข้าสู่ระบบสำเร็จ');
            }
        } else {
            return redirect()->back()->with('error', 'เข้าสู่ระบบไม่สำเร็จ');
        }
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:30',
            'password' => 'required|min:6|confirmed',
            'fullname' => 'required|string|max:50',
            'phone' => 'required|string|max:10',
            'housenumber' => 'required|string|max:20',
            'village' => 'required|string|max:3',
            'alley' => 'string|max:50',
            'road' => 'string|max:50',
            'subdistrict' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'province' => 'required|string|max:50',

        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'housenumber' => $request->housenumber,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,

        ]);

        $validated = auth()->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ], $request->password);

        $request->session()->regenerate();

        if ($validated) {
            Alert::success('สำเร็จ', 'เข้าสู่ระบบสำเร็จ');
            return redirect()->route('home')->with('success', 'เข้าสู่ระบบสำเร็จ');
        } else {
            Alert::error('ผิดพลาด', 'เข้าสู่ระบบไม่สำเร็จ');
            return redirect()->back()->with('error', 'เข้าสู่ระบบไม่สำเร็จ');
        }
    }

    public function logout()
    {
        auth()->logout();
        Alert::success('สำเร็จ', 'ออกจากระบบสำเร็จ');
        return redirect()->route('getLogin')->with('success', 'ออกจากระบบสำเร็จ');
    }
}

<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Rule;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'หน้าแรก'
        ];
        $rooms = Room::all();
        $rules = Rule::find(1);
        return view('home', compact('rooms','rules'), $data);
    }

    public function about()
    {
        $data = [
            'title' => 'เกี่ยวกับเรา'
        ];
        return view('about', $data);
    }
}

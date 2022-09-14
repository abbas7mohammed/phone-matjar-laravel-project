<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data['devices'] = Devices::all();
        return view('client.products')->with($data);
    }

    public function devicedelete($device_id){
        $access = Devices::find($device_id);
        $access->delete();
        return back();
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    public function index(){
        $data['accessories'] = Accessories::all();
        return view('client.accessories')->with($data);
    }

    public function accessdelete($access_id){
        Accessories::find($access_id)->delete();
        return back();
    }
}

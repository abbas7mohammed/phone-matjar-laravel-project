<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $data['user'] = User::all();
        return view('client.userprofile')->with($data);
    }

    public function profileUpdate(Request $request, $user_id){

        $user = User::find($user_id);
        $data = $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
            ]
           );

           $user->update($data);
           return view('client.userprofile');
    }
}

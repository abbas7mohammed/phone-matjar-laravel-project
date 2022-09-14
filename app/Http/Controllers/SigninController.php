<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SigninController extends Controller
{
    public function index(){
        return view('client.sginin');
    }

    public function login(Request $request){
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required'
            ]
        );
        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            $data['bests'] = DB::table('carts')->orderByDesc('quantity')->limit(3)->get();
            return view('welcome')->with($data);
        }else{
            return view('client.sginin')->with('message','there is not account like this');
        }
    }

    public function logout(){
        Auth::logout();
        return view('client.sginin');
    }
}

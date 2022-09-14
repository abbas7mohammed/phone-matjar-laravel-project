<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('client.register');
    }


    public function create(Request $request){
       $data = $request->validate(
        [
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'password'=>'required|max:255',
            'image' => 'nullable',
        ]
       );
       if($request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('asset/images/users'),$imageName);
            $data['image'] = $imageName;
        }
       $data['password']=Hash::make($request->password);
       User::create($data);
       return view('client.sginin');
    }
}

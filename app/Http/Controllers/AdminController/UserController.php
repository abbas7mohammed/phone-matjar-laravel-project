<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Accessories;
use App\Models\Devices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $data['users'] = User::all();

        return view('admin.dashboard')->with($data);
    }

    public function userdelete($user_id){
        Auth::user($user_id)->delete();
        return back();
    }


    public function devicedash(){
        $data['products'] = Devices::all();
        return view('admin.devicesDash')->with($data);
    }

    public function accessoriesdash(){
        $data['accessoriess'] = Accessories::all();
        return view('admin.accessoriesDash')->with($data);
    }


    public function deviceadd(Request $request){

        $data = $request->validate(
         [
             'name'=>'required|max:255',
             'price'=>'required|max:255',
             'image'=>'nullable|image|mimes:png,jpg,jpeg'
         ]
        );

        if($request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('asset/images/device'),$imageName);
            $data['image'] = $imageName;
        }
        Devices::create($data);
        return back();
     }

     public function accessoriesadd(Request $request){
        $data = $request->validate(
         [
             'name'=>'required|max:255',
             'price'=>'required|max:255',
             'image'=>'nullable'
         ]
        );
        if($request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('asset/images/access'),$imageName);
            $data['image'] = $imageName;
        }
        Accessories::create($data);
        return back();
     }

     public function userupdate(Request $request,$user_id){

        $user = User::all();
        $user = User::find($user_id);
        $data = $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'type'=>'required',
                'email'=>'required',
                'image'=>'nullable',
            ]
           );
           $data['password']=Hash::make($request->password);
           if($request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('asset/images/users'),$imageName);
            $data['image'] = $imageName;
        }

           $user->update($data);
           return back();
    }

    public function accessoriesupdate(Request $request,$access_id){

        $access = Accessories::all();
        $access = Accessories::find($access_id);
        $data = $request->validate(
            [
                'name'=>'nullable',
                'price'=>'nullable',
                'image'=>'nullable',
            ]
           );
           if($request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('asset/images/access'),$imageName);
            $data['image'] = $imageName;
        }

           $access->update($data);
           return back();
    }

    public function deviceupdate(Request $request,$device_id){

        $device = Devices::all();
        $device = Devices::find($device_id);
        $data = $request->validate(
            [
                'name'=>'nullable',
                'price'=>'nullable',
                'image'=>'nullable',
            ]
           );
           if($request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('asset/images/device'),$imageName);
            $data['image'] = $imageName;
        }

           $device->update($data);
           return back();
    }


    public function search(Request $request)
    {
        if($request->filled('search_user')){
            $users = User::search($request->search_user)->get();
        }else{
            $users = User::get()->take(10);
        }
        return view('admin.dashboard',compact('users'));
    }

}

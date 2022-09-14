<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function index(){
        $data['items'] = Cart::all()->where('user_id',auth()->user()->id);
        $data['sum1'] = DB::table("carts")->where('user_id',auth()->user()->id)->sum('newprice');


        return view('client.cart')->with($data);
    }


    public function addtocart($access_id,$access_name,$access_price, $user_id){

        $cart = Cart::all('name')->first();
        if($cart->name != $access_name){
            $cart = Cart::create([
                'id'=>$access_id,
                'name'=>$access_name,
                'price'=>$access_price,
                'newprice'=>$access_price,
                'user_id'=>$user_id
            ]);
            $cart->update();
        }else{
            // if item found add to quantity
            $cart = Cart::all()->where('name',$access_name)->first();
            $cart->quantity = $cart->quantity +1;
            $cart->newprice =  $cart->price * $cart->quantity;
            $cart->update();

        }
        return back();
    }


    public function incrementPrice($item_id){

        $cart = Cart::find($item_id);
        $cart->quantity = $cart->quantity +1;
        $cart->newprice =  $cart->price * $cart->quantity;
        $cart->update();
        return back();
    }

    public function deccrementPrice($item_id){

        $cart = Cart::find($item_id);
        $cart->quantity = $cart->quantity -1;
        $cart->newprice =  $cart->price * $cart->quantity;
        $cart->update();
        return back();
    }


    public function showMoresale(){

        $data['bests'] = DB::table('carts')->orderByDesc('quantity')->limit(3)->get();
        return view('welcome')->with($data);
    }


    public function carddelete($item_id){
        Cart::find($item_id)->delete();
        return back();
    }
}



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('authin')->group(function(){
    Route::get('/dashboard',[UserController::class,'index'])->name('admin.dashboard');
    Route::get('/devicedash',[UserController::class,'devicedash'])->name('admin.devicedash');
    Route::get('/accessoriesdash',[UserController::class,'accessoriesdash'])->name('admin.accessoriesdash');

    //search
    Route::post('/usersearch',[UserController::class,'search'])->name('admin.userSearch');



    //delete
    Route::post('/userdelete/{user_id}',[UserController::class,'userdelete'])->name('admin.userDelete');
    Route::post('/devicedelete/{device_id}',[ProductController::class,'devicedelete'])->name('admin.deviceDelete');
    Route::post('/accessdelete/{access_id}',[AccessoriesController::class,'accessdelete'])->name('admin.accessDelete');
    Route::post('/carddelete/{item_id}',[CartController::class,'carddelete'])->name('cardDelete');


    Route::post('/deviceadd',[UserController::class,'deviceadd'])->name('admin.deviceadd');
    Route::post('/accessoriesadd',[UserController::class,'accessoriesadd'])->name('admin.accessoriesadd');

    Route::get('/access_addtocart/{access_id}/{access_name}/{access_price}/{user_id}',[CartController::class,'addtocart'])->name('access_addtocart');
    Route::get('/device_addtocart/{device_id}/{device_name}/{device_price}/{user_id}',[CartController::class,'addtocart'])->name('device_addtocart');

    // price increment
    Route::get('/increment/{item_id}',[CartController::class,'incrementPrice'])->name('incrementPrice');
    // price deccrement
    Route::get('/deccrement/{item_id}',[CartController::class,'deccrementPrice'])->name('deccrementPrice');

    //user update
    Route::post('/user-update/{user_id}',[UserController::class,'userupdate'])->name('admin.userUpdate');

    //accessories update
    Route::post('/accessories-update/{access_id}',[UserController::class,'accessoriesupdate'])->name('admin.accessoriesUpdate');

    //device update
    Route::post('/device-update/{device_id}',[UserController::class,'deviceupdate'])->name('admin.deviceUpdate');

});


Route::post('/register',[RegisterController::class,'create'])->name('register.create');
Route::get('/register',[RegisterController::class,'index'])->name('register.index');


Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/accessories',[AccessoriesController::class,'index'])->name('accessories.index');
Route::get('/cart',[CartController::class,'index'])->name('cart.index')->middleware('auth');

Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
Route::post('/profile/{user_id}',[ProfileController::class,'profileUpdate'])->name('profile.profileUpdate');


//signin
Route::post('/signin',[SigninController::class,'login'])->name('signin.login');
Route::get('/signin',[SigninController::class,'index'])->name('signin.index');
Route::get('/logout',[SigninController::class,'logout'])->name('signin.logout');

//register
Route::get('/',[CartController::class,'showMoresale'])->name('home');;



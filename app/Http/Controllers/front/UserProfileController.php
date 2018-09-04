<?php

namespace App\Http\Controllers\front;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function index(){
        $id    = auth()->user()->id;
        $user  = User::where('id',$id)->first();
        $order = Order::where('id',$id)->first();

        return view('front.profile.index',compact('user','order'));
    }
    public function show($id) {
        $order = Order::find($id);
        return view('front.profile.details', compact('order'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Order;
class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.orders.index',compact('orders'));
    }

    public function confirm($id){
        //find id of the order
        $order = Order::find($id);

        //Convert Status
        $order->update(['status' => 1]);

        //Session Message
        session()->flash('msg','Order has been confirmed');

        //Return Redirect
        return redirect ('/admin/orders');
    }

    public function pending($id){
        //find id of the order
        $order = Order::find($id);

        //Convert Status
        $order->update(['status' => 0]);

        //Session Message
        session()->flash('msg','Order again has been Pending');

        //Return Redirect
        return redirect ('/admin/orders');
    }

    public function show($id){
        $order = Order::find($id);
        return view('admin.orders.details',compact('order'));

    }

}

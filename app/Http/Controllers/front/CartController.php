<?php

namespace App\Http\Controllers\front;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dubl = Cart::search(function($cartitem , $rowId)use($request){

            return $cartitem->id === $request->id;
        });

        if($dubl->isNotEmpty()){

            return redirect()->back()->with('msg','Item has been already in cart');
        }

        Cart::add($request->id,$request->name,1,$request->price)->associate('App\Product');

        return redirect()->back()->with('msg','Item has been added to cart');
    }
    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return redirect()->back()->with('msg','Item has been Deleted ');
    }

    public function save($id)
    {

        $item = Cart::instance('default')->get($id);

        Cart::instance('default')->remove($id);

        $dubl = Cart::instance('saveForLater')->search(function($cartitem , $rowId)use($id){
            return $cartitem->id === $id;
        });

        if($dubl->isNotEmpty()){
            return redirect()->back()->with('msg','Item has been already in save to later');
        }

        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Product');

        return redirect()->back()->with('msg','Item has been Save For Later ');
    }

     public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between: 1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors','Quantity must be between 1 and 5');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->quantity);

        session()->flash('msg','Quantity has been updated');

        return response()->json(['success' => true]);

}
}
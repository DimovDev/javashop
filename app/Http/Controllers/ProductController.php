<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create(){
        return view('admin.products.add_product');
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

           $request->validate([
                'name' => 'required',
                'price' => 'required',
                'descrption' => 'required',
                'image' => 'image|required'
            ]);

        /*STORE IMAGE*/
        if($request->hasFile('image')){
            $image = $request->image;
            $imageNew = rand(0,100000000).$image->getClientOriginalName();
            $image->move('uploads',$imageNew);

        }

        Product::create([
            'name'       => $request->name,
            'price'      => $request->price,
            'descrption' => $request->descrption,
            'image'      => $imageNew
        ]);

        $request->session()->flash('msg','Your product has been added');

        return redirect('/admin/product/create');
    }

    public function show($id)
    {
       $product = Product::find($id);
       return view('admin.products.details',compact('product'));

    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'descrption' => 'required'
        ]);

        if($request->hasFile('image')){

            if(file_exists(public_path('uploads/').$product->image)){
                unlink(public_path('uploads/').$product->image);
            }

            $image = $request->image;
            $imageNew = rand(0,100000000).$image->getClientOriginalName();
            $image->move('uploads',$imageNew);
            $product->image = $imageNew;
        }

        $product->update([
            'name'       => $request->name,
            'price'      => $request->price,
            'descrption' => $request->descrption,
            'image'      => $product->image
        ]);

        $request->session()->flash('msg','Your product has been updated');
        return redirect('/admin/product');

    }


    public function destroy($id)
    {
        Product::destroy($id);
        session()->flash('msg','Your product has been deleted');
        return redirect('/admin/product');

    }
}

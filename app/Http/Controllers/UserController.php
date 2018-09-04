<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.details',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block($id){
        //find id of the order
        $user = User::find($id);

        //Convert Status
        $user->update(['status' => 0]);

        //Session Message
        session()->flash('msg','User has been blocked');

        //Return Redirect
        return redirect ('/admin/users');
    }

    public function active($id){
        //find id of the order
        $user = User::find($id);

        //Convert Status
        $user->update(['status' => 1]);

        //Session Message
        session()->flash('msg','User has been active');

        //Return Redirect
        return redirect ('/admin/users');
    }

}

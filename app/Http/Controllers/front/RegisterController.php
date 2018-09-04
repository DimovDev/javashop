<?php

namespace App\Http\Controllers\front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function  index(){
        return view('front.registration.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){

        //Validate Form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' =>'required'
        ]);

        //Put data in database
        $user  = User::create([
            'name'     =>$request->name,
            'email'    =>$request->email,
            'password' =>bcrypt($request->password),
            'address'  =>$request->address
        ]);

        Auth()->login($user);

        return redirect('user/profile');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminUserController extends Controller
{
    /**
     * AdminUserController constructor.
     */
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }

    public function index(){

        return view('admin.login');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        // Log the user In
        $credentials = $request->only('email','password');

        if (! Auth::guard('admin')->attempt($credentials)) {
            return back()->withErrors([
                'message' => 'Wrong credentials please try again'
            ]);
        }

        $request->session()->flash('msg','You have been logged in');

        return redirect('/admin');
    }

    public function logout(){

        auth()->guard('admin')->logout();

        session()->flash('msg','You have been logged out');

        return redirect('/admin/login');
    }

}
